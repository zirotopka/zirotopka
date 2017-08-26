{{--
  -- For more information about form fields
  -- you can visit Yandex Kassa documentation page
  --
  -- @see https://tech.yandex.com/money/doc/payment-solution/payment-form/payment-form-http-docpage/
  --}}
<form action="{{yandex_kassa_form_action()}}" method="{{yandex_kassa_form_method()}}" class="form-horizontal">
    <input name="scId" type="hidden" value="{{yandex_kassa_sc_id()}}">
    <input name="shopId" type="hidden" value="{{yandex_kassa_shop_id()}}">
    <div class="form-group">
        <label for="yandex_money_sum" class="control-label col-sm-2">{{trans('yandex_kassa::form.label.sum')}}</label>
        <div class="col-sm-10">
            <input name="sum" id="yandex_money_sum" value="100.00" type="hidden">
        </div>
    </div>
    <div class="form-group">
        <label for="yandex_money_customer_number" class="control-label col-sm-2">{{trans('yandex_kassa::form.label.customer_number')}}</label>
        <div class="col-sm-10">
            <input name="customerNumber" id="yandex_money_customer_number" type="text" class="form-control">
        </div>
    </div>
    <input name="paymentType" value="AC" type="hidden"/>
    <input name="cps_phone" value="{{$user->phone}}" type="hidden"/>
    <input name="cps_email" value="{{$user->email}}" type="hidden"/>
    <input name="shopSuccessURL" value="{{env('APP_URL').'/lk/'.$user->id.'/yaPay?type=success'}}" type="hidden"/>
    <input name="shopFailURL" value="{{env('APP_URL').'/lk/'.$user->id.'/yaPay?type=fail'}}" type="hidden"/>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">{{trans('yandex_kassa::form.button.pay')}}</button>
        </div>
    </div>

</form>