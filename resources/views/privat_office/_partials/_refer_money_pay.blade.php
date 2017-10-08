@extends('layouts.main')

@section('js')
    @parent

    <script type="text/javascript" src="/assets/privat_account/modal/refer-pay.js?123"></script>
    <script type="text/javascript" src="/assets/privat_account/modal/cloneSum.js?123"></script>
@overwrite

@section('css')
    @parent

@overwrite

@section("content")
	@include('privat_office._partials._refer_money_modal',['pay_description' => $pay_description,'user' => $user, 'sum' => $sum])
@overwrite