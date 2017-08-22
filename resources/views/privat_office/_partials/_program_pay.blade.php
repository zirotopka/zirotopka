@extends('layouts.main')

@section('css')
    @parent

@overwrite

@section('js')
    @parent

@overwrite

@section("content")
<h1 style="padding-top: 40px">Оплатить программу</h1>
<form action="https://demomoney.yandex.ru/eshop.xml" method="post">
    <input name="shopId" value="147658" type="hidden"/>
    <input name="scid" value="557261" type="hidden"/>
    {{-- <input name="sum" value="{{$sum}}" type="hidden"> --}}
    <input name="sum" value="1" type="hidden">
    <input name="customerNumber" value="{{md5(uniqid())}}" type="hidden"/>
    <input name="paymentType" value="AC" type="hidden"/>
    <input name="cps_phone" value="{{$user->phone}}" type="hidden"/>
    <input name="cps_email" value="{{$user->email}}" type="hidden"/>
    <input name="shopSuccessURL" value="{{env('APP_URL').'/lk/'.$user->id.'/yaPay?type=success'}}" type="hidden"/>
    <input name="shopFailURL" value="{{env('APP_URL').'/lk/'.$user->id.'/yaPay?type=fail'}}" type="hidden"/>
  <input type="submit" value="Заплатить"/>
</form>
@overwrite