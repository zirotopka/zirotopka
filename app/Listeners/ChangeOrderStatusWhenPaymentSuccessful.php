<?php

namespace App\Listeners;

use Artem328\LaravelYandexKassa\Events\BeforePaymentAvisoResponse;
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
            
        } else {
            // Logic on non valid hash
            // You don't need to set response code to 1
            // YandexKassaRequest do it automatically
        }
    }
}