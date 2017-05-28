<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

use Validator;
use App\Balance;

use Illuminate\Http\Request;

class UserController extends CartalystUser
{	
	/**
	 * Регистрация пользователя
	 */
    public function registration (Request $request) {
    	$rules = [
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
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
            'sex' => $request->get("sex"),
            'weight' => $request->get("weight"),
            'growth' => $request->get("growth"),
            'age' => $request->get("age"),
            'phone' => $request->get("phone"),
            'user_ip' => $_SERVER["REMOTE_ADDR"],
            'referer_code' => md5( date('Y-m-d').uniqid(rand(), true) ),
        ];

        $user = Sentinel::register($credentials);

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
    }
}
