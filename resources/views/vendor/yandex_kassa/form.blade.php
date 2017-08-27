{{--
  -- For more information about form fields
  -- you can visit Yandex Kassa documentation page
  --
  -- @see https://tech.yandex.com/money/doc/payment-solution/payment-form/payment-form-http-docpage/
  --}}
<form action="{{yandex_kassa_form_action()}}" method="{{yandex_kassa_form_method()}}" class="form-horizontal">
    <input name="scId" type="hidden" value="{{yandex_kassa_sc_id()}}">
    <input name="shopId" type="hidden" value="{{yandex_kassa_shop_id()}}">
    <input name="sum" id="yandex_money_sum" value="100.00" type="hidden">
    <input name="customerNumber" id="yandex_money_customer_number" type="hidden" class="form-control" value="{{ $user->id }}">
    <input name="paymentType" value="AC" type="hidden"/>
    <input name="cps_phone" value="{{$user->phone}}" type="hidden"/>
    <input name="cps_email" value="{{$user->email}}" type="hidden"/>
    <input name="shopSuccessURL" value="{{env('APP_URL').'/yandex/answer'}}" type="hidden"/>
    <input name="shopFailURL" value="{{env('APP_URL').'/lk/'.$user->id}}" type="hidden"/>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">{{trans('yandex_kassa::form.button.pay')}}</button>
        </div>
    </div>

</form>