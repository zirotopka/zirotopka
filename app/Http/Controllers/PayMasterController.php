<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayMasterController extends Controller
{
    public function notification (Request $request) {
    	\Log::info($request->all());
    }

    public function success (Request $request) {
    	\Log::info($request->all());
    }

    public function invoice (Request $request) {
    	\Log::info($request->all());
    }
}
