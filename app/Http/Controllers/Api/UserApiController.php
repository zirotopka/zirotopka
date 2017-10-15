<?php

namespace App\Http\Controllers\Api;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

use Validator;

class UserApiController extends Controller
{   
    /**
     * Сохранение email
     * 
     * @return \Illuminate\Http\Response
     */
    public function email_store(Request $request)
    {   
        $rules = [
            'email' => 'required|email|unique:users,email',
        ];

        $messages = [
            'email.required' => 'Не указана почта',
            'email.email' => 'Не верный формат почты',
            'email.unique' => 'Данный адрес почты уже занят',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['code' => 400, 'text' => json_encode($validator->messages())]);
        }

        $credentials = [
            'email'    => $request->get("email"),
            'password' => uniqid(),
        ];

        $user = Sentinel::register($credentials);

        if ( $user ) {
            $user->first_name = $request->get("name");
            $user->save();

            $role = Sentinel::findRoleBySlug("pretender");
            $role->users()->attach($user);
        }

        return redirect('http://reformator.one');
        //return response()->json(['code' => 200, 'text' => 'Email успешно сохранен']);
    }

    /**
     * Проверяем наличие email
     */
    public function checkEmail(Request $request) {
        $rules = [
            'email' => 'required|email|unique:users,email',
        ];

        $messages = [
            'email.required' => 'Не указана почта',
            'email.email' => 'Не верный формат почты',
            'email.unique' => 'Данный адрес почты уже занят',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return ['response' => 400,'text' => json_encode($validator->messages())];
        }

        return ['response' => 200];
    }
}
