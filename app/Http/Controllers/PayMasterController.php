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
    }

    public function invoice (Request $request) {
    	\Log::info('invoice:'.json_encode($request->all()));
    }

    public function failure (Request $request) {
    	\Log::info('failure:'.json_encode($request->all()));
    }
}
