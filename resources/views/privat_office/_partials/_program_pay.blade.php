@extends('layouts.main')

@section('css')
    @parent
    <link href="/assets/privat_account/pay-modal.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <script type="text/javascript" src="/assets/privat_account/pay-modal.js?123"></script>


@overwrite

@section("content")
<div class="modal fade" id="pay-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="orang-txt test">ЗАВЕРШЕНИЕ ТЕСТОВОГО ПЕРЕОДА</p>        
                <p class="gray-text">К сожалению, Ваш тестовый период закончился. <br>Чтобы продолжить участие, необходимо оплатить программу</p>
                <p class="orang-txt price">2500 РУБ.</p>
                <form action="https://demomoney.yandex.ru/eshop.xml" method="post">
                    <input name="shopId" value="147658" type="hidden"/>
                    <input name="scid" value="557261" type="hidden"/>
                    {{-- <input name="sum" value="{{$sum}}" type="hidden"> --}}
                    <input name="sum" value="100.00" type="hidden">
                    <input name="customerNumber" value="{{md5(uniqid())}}" type="hidden"/>
                    <input name="paymentType" value="AC" type="hidden"/>
                    <input name="cps_phone" value="{{$user->phone}}" type="hidden"/>
                    <input name="cps_email" value="{{$user->email}}" type="hidden"/>
                    <input name="shopSuccessURL" value="{{env('APP_URL').'/lk/'.$user->id.'/yaPay?type=success'}}" type="hidden"/>
                    <input name="shopFailURL" value="{{env('APP_URL').'/lk/'.$user->id.'/yaPay?type=fail'}}" type="hidden"/>
                  <input type="submit" value="ОПЛАТИТЬ" class="link"/>
                </form>            
            </div>
        </div>
    </div>
</div>
@overwrite