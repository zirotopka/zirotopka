<?php

namespace App\Http\Controllers;

use App\User;

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

    // [2017-09-24 14:07:11] local.INFO: invoice:{"LMI_MERCHANT_ID":"273ebbb9-8678-4e29-860f-91eb86630816","LMI_PAYMENT_SYSTEM":"503","LMI_CURRENCY":"RUB","LMI_PAYMENT_AMOUNT":"2500.00","LMI_PAYMENT_DESC":"ReferMoney","LMI_PAID_AMOUNT":"2500.00","LMI_PAID_CURRENCY":"RUB","LMI_PREREQUEST":"1","LMI_PAYMENT_METHOD":"Test","PAYER_ID":"39"} 
    public function invoice (Request $request) {
    	$LMI_MERCHANT_ID = $request->get('LMI_MERCHANT_ID');

    	if ($LMI_MERCHANT_ID != env('PAYMASTER_LMI_MERCHANT_ID')) {
    		\Log::warning('PayMasterController: Не совпадает LMI_MERCHANT_ID. Json: '.json_encode($request->all()));
    		return false;
    	}

        $LMI_PAID_AMOUNT = (float) $request->get('LMI_PAYMENT_AMOUNT');
        $userID = $request->get('PAYER_ID');

        $user = User::where('user_id','=',$userID)->first();

        if (empty($user)) {
    		\Log::warning('PayMasterController: Отсутствует пользователь. Json: '.json_encode($request->all()));
    		return false;
    	}

    	if (empty($user->current_programm_id)) {
    		\Log::warning('PayMasterController: Отсутствует программа у пользователя. Json: '.json_encode($request->all()));
    		return false;
    	}

    	$sum = $user->current_program->cost;
        $parents = $user->parents;

        if (count($parents) > 0) {
            $sum = $sum * 0.9;
        }

        if ($LMI_PAID_AMOUNT < $sum) {
        	\Log::warning('PayMasterController: Стоимость программы превышает сумму. Json: '.json_encode($request->all()));
    		return false;
        }

        return response('YES', 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function failure (Request $request) {
        \Log::info('failure:'.json_encode($request->all()));
    }
}
