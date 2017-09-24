<?php

namespace App\Http\Controllers;

use App\User;
use App\Accrual;

use Illuminate\Http\Request;

class PayMasterController extends Controller
{	

	// [2017-09-24 14:07:12] local.INFO: notification:{"LMI_MERCHANT_ID":"273ebbb9-8678-4e29-860f-91eb86630816","LMI_PAYMENT_SYSTEM":"503","LMI_CURRENCY":"RUB","LMI_PAYMENT_AMOUNT":"2500.00","LMI_PAYMENT_DESC":"ReferMoney","LMI_SYS_PAYMENT_DATE":"2017-09-24T14:07:11","LMI_SYS_PAYMENT_ID":"89667424","LMI_PAID_AMOUNT":"2500.00","LMI_PAID_CURRENCY":"RUB","LMI_SIM_MODE":"0","LMI_PAYER_IDENTIFIER":"4XXXXXXXXXXX0010","LMI_PAYMENT_METHOD":"Test","PAYER_ID":"39","LMI_HASH":"B33BsjMgXiGBo0NS8\/NF7w=="}  
    public function notification (Request $request) {
    	$LMI_PAID_AMOUNT = (float) $request->get('LMI_PAYMENT_AMOUNT');
        $userID = $request->get('PAYER_ID');

        $accrual = new Accrual;
        $accrual->sum = $LMI_PAID_AMOUNT;
        $accrual->user_id = $userID;
        $accrual->type_id = 1;
        $accrual->comment = 'Успешная оплата программы';
        $accrual->accruals_json = json_encode($request->all());
        if (!$accrual->sum()) {
        	\Log::warning('PayMasterController: Не сохранен платеж в системе. Json: '.json_encode($request->all()));
        }

        return true;
    }

    // [2017-09-24 14:07:48] local.INFO: success:{"LMI_MERCHANT_ID":"273ebbb9-8678-4e29-860f-91eb86630816","LMI_CURRENCY":"RUB","LMI_PAYMENT_AMOUNT":"2500.00","LMI_SYS_PAYMENT_DATE":"2017-09-24T14:07:12","LMI_SYS_PAYMENT_ID":"89667424","PAYER_ID":"39"}  
    public function success (Request $request) {
        $userID = $request->get('PAYER_ID');

        $user = User::select('slug','id'->where('id','=',$userID))->first();

        if (empty($user)) {
        	return redirect('/');
        }

        return redirect('/'.$user->slug);
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

        $user = User::where('id','=',$userID)->first();

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
        return redirect('/');
    }
}
