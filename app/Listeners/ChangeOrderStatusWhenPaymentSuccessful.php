<?php

namespace App\Listeners;

use Artem328\LaravelYandexKassa\Events\BeforePaymentAvisoResponse;
use App\User;
use App\Accrual;
use \Log;

class ChangeOrderStatusWhenPaymentSuccessful
{
    /**
     * @param \Artem328\LaravelYandexKassa\Events\BeforePaymentAvisoResponse
     * @return void
     */
    public function handle(BeforePaymentAvisoResponse $event)
    {
        // if hash is valid we know that payment is successful
        // and we can change order status
        Log::info(json_encode($event->request->all()));
        if ($event->request->isValidHash()) {
            $user = User::find(intval($event->request->get('customerNumber'))); 
            if (!empty($user)) {
                $accruals = new Accrual;
                $accruals->sum = $event->request->get('orderSumAmount');
                $accruals->type_id = 1;
                $accruals->user_id = $user->id;
                $accruals->balance_id = null;
                $accruals->comment = 'Оплата программы';
                $accruals->accruals_yandex_json = json_encode($event->request->all());
                $accruals->accruals_good_type = 1ж//Программа

                if ($accruals->save()) {
                    $user->is_programm_pay = 1;
                    $user->status = 1;
                    $user->save();
                } else {
                    Log::warning('Счет не сохранен');
                }
            } else {
                Log::warning('Пользователь не найден');
            }
        } else {
             Log::warning('Невалидный ответ');
        }
    }
}

// {"orderSumAmount":"100.00","cdd_exp_date":"1225","shopArticleId":"453084","paymentPayerCode":"4100322062290","paymentDatetime":"2017-08-27T13:41:23.519+03:00","cdd_rrn":"635933862245","external_id":"deposit","paymentType":"AC","requestDatetime":"2017-08-27T13:41:24.052+03:00","depositNumber":"ic8d_u9jC_cx3eZpU2bhXHGCPF0Z.001f.201708","cdd_response_code":"00","cps_user_country_code":"PL","orderCreatedDatetime":"2017-08-27T13:41:23.258+03:00","sk":"u4c95009f63bb6cc3bcf211c14bd87af2","action":"paymentAviso","shopId":"147658","scid":"557261","shopSumBankPaycash":"1003","shopSumCurrencyPaycash":"10643","rebillingOn":"false","orderSumBankPaycash":"1003","cps_region_id":"213","orderSumCurrencyPaycash":"10643","merchant_order_id":"4_270817134112_00000_147658","unilabel":"2134b588-0009-5000-8000-0000254f5922","cdd_pan_mask":"444444|4448","customerNumber":"4","yandexPaymentId":"25700108063238","environment":"Live","invoiceId":"2000001456189","shopSumAmount":"96.50","md5":"9F44F0F5D5AA663C5416012565D565B5"}  
