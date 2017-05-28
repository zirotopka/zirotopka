<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Validator;
use App\Balance;

use Illuminate\Http\Request;

class UserController extends Controller
{	
	/**
	 * Регистрация пользователя
	 */
    public function registration (Request $request) {
    	$rules = [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required|boolean',
            'phone' => 'required',
        ];
        $messages = [
            'email.required' => 'Не указана почта',
            'email.email' => 'Не верный формат почты',
            'email.unique' => 'Данный адрес почты уже занят',

            'name.required' => 'Укажите Фамилию Имя Отчество',
            'first_name.required' => 'Имя не указано',
            'last_name.required' => 'Фамилия не указано',
            'sex.required' => 'Пол не указан',

            'phone.required' => 'Телефон не указан',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

    	$credentials = [
            'email'    => $request->get("email"),
            'password' => $request->get("password"),
            'first_name' => $request->get("first_name"),
            'last_name' => $request->get("last_name"),
        ];

        $user = Sentinel::register($credentials);

        if ( $user ) {
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

            dd($user);
        } else {
            dd('error');
        }
    }
}
