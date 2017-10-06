<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Socialite;

class SocialController extends Controller
{

    public function login($provider, Request $request)
    {   
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {
        $driver = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);
        dd($user);
        \Auth::login($user, true);
        return redirect()->intended('/');

    }

} 