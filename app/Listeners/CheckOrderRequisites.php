<?php
namespace App\Listeners;

use Artem328\LaravelYandexKassa\Events\BeforeCheckOrderResponse;

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
        // If you have some custom validation of payment form
        // You can change response parameters before controller
        // will show it
        if ($event->request->get('customField') != '1') {
            $event->responseParameters['code'] = 100;
            $event->responseParameters['message'] = 'Some checkbox was not checked';
            // You must to return response parameters array,
            // for apply changes
            return $event->responseParameters;
        }

        // If there's no parameters changes
        // just return null or empty array
        return null;
    }
}