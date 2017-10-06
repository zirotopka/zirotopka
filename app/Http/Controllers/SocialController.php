<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Socialite;

class SocialController extends Controller
{

    public function login($provider)
    {
        return Socialite::with($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {
        dd($service);
        $driver = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);

        dd($user);
        \Auth::login($user, true);
        return redirect()->intended('/');

    }

} 