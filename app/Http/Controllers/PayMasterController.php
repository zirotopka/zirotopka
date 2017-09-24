<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayMasterController extends Controller
{
    public function notification (Request $request) {
        \Log::info('notification:'.json_encode($request->all()));
    }

    public function success (Request $request) {
        \Log::info('success:'.json_encode($request->all()));

        return response('YES', 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function invoice (Request $request) {
        \Log::info('invoice:'.json_encode($request->all()));

        return response('YES', 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function failure (Request $request) {
        \Log::info('failure:'.json_encode($request->all()));
    }
}
