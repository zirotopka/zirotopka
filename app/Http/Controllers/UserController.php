<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;

use Validator;
use App\Balance;
use App\Helpers\IP;
use App\AdjancyList;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

use Carbon\Carbon;

class UserController extends Controller
{	

    /**
     * Заменить лого у юзера
     */
    public function change_logo (Request $request) {
        if ($request->hasFile('logo'))
        {   
            $user = Sentinel::getUser();
            $file = $request->file('logo');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $destinationPath = public_path().'/image/logos/';
            $file->move($destinationPath, $fileName);

            $image = Image::make($destinationPath.$fileName)->resize(100, 100);
            $image->save($destinationPath.$fileName);

            $user->user_ava_url = $fileName;
            $user->save();

            return ['response' => 200,'url' => $fileName];
        } else {
            return ['response' => 500];
        }
    }

	/**
	 * Регистрация пользователя
	 */
    public function registration (Request $request) {
    	$rules = [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'surname' => 'required',
        ];
        $messages = [
            'email.required' => 'Не указана почта',
            'email.email' => 'Не верный формат почты',
            'email.unique' => 'Данный адрес почты уже занят',

            'name.required' => 'Укажите Фамилию Имя Отчество',
            'first_name.required' => 'Имя не указано',
            'surname.required' => 'Фамилия не указано',

            'offer.required' => 'Согласитесь с оффертой',
            'adult.required' => 'Подтвердите что вам больше 14 лет',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

    	$credentials = [
            'email'    => $request->get("email"),
            'password' => $request->get("password"),
            'first_name' => $request->get("first_name"),
            'surname' => $request->get("surname"),
        ];

        $user = Sentinel::register($credentials);

        if ( $user ) {
            $user->surname = $request->get("surname");
            $user->weight = $request->get("weight");
            $user->growth = $request->get("growth");
            $user->age = $request->get("age");
            $user->phone = $request->get("phone");

            $slug = User::getSlug($user->first_name, $user->last_name, $user->surname);

            $user->slug = $slug;
            $user->status = 1;
            $user->save();

            $user->referer_code = md5( date('Y-m-d').uniqid(rand(), true) );

            $activation = Activation::create($user);
            $activation->completed = 1;
            $activation->save();

            $role = Sentinel::findRoleBySlug("client");
            $role->users()->attach($user);

            Balance::create([
                'user_id' => $user->id,
                'sum' => 0,
            ]);

            //referer_code
            if (session()->has('ref')) {
                $reverralSlug = $request->session()->pull('ref');
                $referral = User::select('id','first_name','surname','slug')->where('slug','=',$reverralSlug)->first();

                if (!empty($referral) && ($user->id != $referral->id)) {
                    $adjancy = new AdjancyList;
                    $adjancy->user_id = $user->id;
                    $adjancy->pid = $referral->id;
                    $adjancy->save();
                }
            }

            Sentinel::authenticateAndRemember([ 'email' => $request->get('email'), 'password' => $request->get('password') ]);

            return redirect($user->slug);
        } else {
            return redirect()->back()->withErrors();
        }
    }

    /**
     * Логин
     */
    public function login(Request $request) {
        $user = Sentinel::authenticateAndRemember([ 'email' => $request->get('email'), 'password' => $request->get('password') ]);

        if( $user === false ) {
            return redirect()->back()->withErrors(['login' => 'Неверный логин или пароль']);
        } else {
            return redirect($user->slug);
        }
    }

    /**
     * Логаут
     */
    public function logout() {
        Sentinel::logout();
        return Redirect::to('/login');
    }

    public function setPassword() {
        $user = Sentinel::getUser();

        return view('user._set_password', ['user' => $user]);
    } 

    public function postSetPassword(Request $request) {
        $rules = [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];

        $messages = [
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимум 6 символов',
            'password.confirmed' => 'Пароль не совпадает',

            'password_confirmation.required' => 'Подтвердите пароль',
        ];

        $user = Sentinel::getUser();
        $password = $request->get('password');

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $credentials = [
            'password' => $password,
        ];

        $user = Sentinel::update($user, $credentials);

        return redirect()->route('lk', ['slug' => $user->slug]);
    }  

    public function forgetPassword() {
         return view('user._forget_password');
    }

    public function postForgetPassword(Request $request) {
        $rules = [
            'password_old' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];

        $messages = [
            'password_old.required' => 'Введите старый пароль',
            'password.required' => 'Введите новый пароль',
            'password_confirmation.required' => 'Введите пароль подтверждения',
            'password_old.min' => 'Минимум 6 символов',
            'password.min' => 'Минимум 6 символов',
            'password.confirmed' => 'Пароль не совпадает',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $user = User::select('id','email')
                    ->where('email','=',$request->get('email'))
                    ->first();

        if (empty($user)) {
            return redirect()->back()->withErrors(['login' => 'Неверный логин или пароль']);
        }

        $user = Sentinel::findUserById($user->id);

        $credentials = [
            'email'    => $request->get('email'),
            'password' => $request->get('password_old'),
        ];

        $check = Sentinel::validateCredentials($user, $credentials);
        
        if (empty($check)) {
            return redirect()->back()->withErrors(['login' => 'Старый пароль или email не совпадают']);
        }

        $reminder = Reminder::create($user);

        $code = $reminder->code;

        if ($reminder = Reminder::complete($user, $code, $request->get('password')))
        {   
            session(['success_array' => ['caption' => 'Успешно!', 'text' => 'Пароль успешно обновлен']]);

            return redirect('/');
        }
        else
        {
            return redirect()->back()->withErrors(['login' => 'Пароль не может быть обновлен']);
        }
    }
}
