<?php

namespace App\Listeners;

use Artem328\LaravelYandexKassa\Events\BeforeCheckOrderResponse;
use App\User;

use \Log;

class CheckOrderRequisites
{
    /**
     * @param \Artem328\LaravelYandexKassa\Events\BeforeCheckOrderResponse
     * @return array|null
     */
    public function handle(BeforeCheckOrderResponse $event)
    {   
        Log::info(json_encode($event->request->all()));
        if ( $event->request->has('customerNumber') ) {
            $user = User::find(intval($event->request->get('customerNumber'))); 

            if (!empty($user) && !empty($user->current_programm_id) && empty($user->is_programm_pay)) {
                $sum = $user->current_program->cost;
                $parents = $user->parents;

                if (count($parents) > 0) {
                    $sum = $sum * 0.9;
                }

                if (intval($sum) == intval($event->request->get('orderSumAmount'))) {
                    return $event->responseParameters;
                } else {
                    Log::warning('Сумма программы не равна платежу');
                    $event->responseParameters['code'] = 100;
                    $event->responseParameters['message'] = 'Сумма оплаты не совпадает с суммой программы';

                    return $event->responseParameters;
                }
            } else {
                Log::warning('Пользователь не найден или отсутствует программа');
            }
        }

        Log::warning('Пользователь не найден');

        return null;
    }
}