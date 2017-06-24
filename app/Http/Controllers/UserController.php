<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Validator;
use App\Balance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{	
	/**
	 * Регистрация пользователя
	 */
    public function registration (Request $request) {

    	$rules = [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'surname' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'offer' => 'required',
            'adult' => 'required',
        ];
        $messages = [
            'email.required' => 'Не указана почта',
            'email.email' => 'Не верный формат почты',
            'email.unique' => 'Данный адрес почты уже занят',

            'name.required' => 'Укажите Фамилию Имя Отчество',
            'first_name.required' => 'Имя не указано',
            'surname.required' => 'Фамилия не указано',
            'sex.required' => 'Пол не указан',

            'phone.required' => 'Телефон не указан',

            'offer.required' => 'Согласитесь с оффертой',
            'adult.required' => 'Подтвердите что вам больше 14 лет',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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
            $user->sex = $request->get("sex");
            $user->weight = $request->get("weight");
            $user->growth = $request->get("growth");
            $user->age = $request->get("age");
            $user->phone = $request->get("phone");
            $user->user_ip = $_SERVER["REMOTE_ADDR"];
            $user->referer_code = md5( date('Y-m-d').uniqid(rand(), true) );

            $user->save();

            $activation = Activation::create($user);
            $activation->completed = 1;
            $activation->save();

            $role = Sentinel::findRoleBySlug("client");
            $role->users()->attach($user);

            Balance::create([
                'user_id' => $user->id,
                'sum' => 0,
            ]);

            Sentinel::authenticateAndRemember([ 'email' => $request->get('email'), 'password' => $request->get('password') ]);

            return redirect('lk/'.$user->id);
        } else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Логин
     */
    public function login(Request $request) {
        $user = Sentinel::authenticateAndRemember([ 'email' => $request->get('email'), 'password' => $request->get('password') ]);

        if( $user === false ) {
            return redirect()->back();
        } else {
            return redirect('lk/'.$user->id);
        }
    }

    /**
     * Логаут
     */
    public function logout() {
        Sentinel::logout();
        return Redirect::to('/login');
    }
}
