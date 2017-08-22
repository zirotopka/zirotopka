<?php

namespace App\Http\Controllers\Api;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;//Временно
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class YandexController extends Controller
{   
    // public function checkURL(Request $request)
    // {   
    //     Log::info(json_encode($request->all()));
    // }

    // public function checkURLTest(Request $request)
    // {   
    //     Log::info(json_encode($request->all()));
    // }

    // public function paymentAvisoURL(Request $request)
    // {   
    //     Log::info(json_encode($request->all()));
    // }

    // public function paymentAvisoURLTest(Request $request)
    // {   
    //     Log::info(json_encode($request->all()));
    // }

    public function checkURL(Request $request)
    {   
        Log::info(json_encode($request->all()));
    }

    public function avisoURL(Request $request)
    {   
        Log::info(json_encode($request->all()));
    }

    public function checkURLTest(Request $request)
    {   
        Log::info(json_encode($request->all()));
    }

    public function avisoURLTest(Request $request)
    {   
        Log::info(json_encode($request->all()));
    }

}