{{--
  -- For more information about form fields
  -- you can visit Yandex Kassa documentation page
  --
  -- @see https://tech.yandex.com/money/doc/payment-solution/payment-form/payment-form-http-docpage/
  --}}


<div class="modal fade" id="pay-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="orang-txt test">ЗАВЕРШЕНИЕ ТЕСТОВОГО ПЕРЕОДА</p>        
                <p class="gray-text">К сожалению, Ваш тестовый период закончился. <br>Чтобы продолжить участие, необходимо оплатить программу</p>
                <p class="orang-txt price">2500 РУБ.</p>
                <form action="{{yandex_kassa_form_action()}}" method="{{yandex_kassa_form_method()}}" class="form-horizontal">
                    <input name="scId" type="hidden" value="{{yandex_kassa_sc_id()}}">
                    <input name="shopId" type="hidden" value="{{yandex_kassa_shop_id()}}">
                    <input name="sum" id="yandex_money_sum" value="{{$sum}}" type="hidden">
                    <input name="shopArticleId" type="hidden" class="form-control" value="{{ $shopArticle }}">
                    <input name="customerNumber" id="yandex_money_customer_number" type="hidden" class="form-control" value="{{ $user->id }}">
                    <input name="paymentType" value="AC" type="hidden"/>
                    <input name="cps_phone" value="{{$user->phone}}" type="hidden"/>
                    <input name="cps_email" value="{{$user->email}}" type="hidden"/>
                    <input name="shopSuccessURL" value="{{env('APP_URL').'/yandex/answer'}}" type="hidden"/>
                    <input name="shopFailURL" value="{{env('APP_URL').'/lk/'.$user->id}}" type="hidden"/>
                    <div class="form-group">
                        <div>
                          <input type="submit" value="ОПЛАТИТЬ" class="link"/>
                        </div>
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>

