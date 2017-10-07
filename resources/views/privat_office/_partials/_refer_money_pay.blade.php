@extends('layouts.main')

@section('css')
    @parent

@overwrite

@section("content")
	@include('privat_office._partials._refer_money_modal',['pay_description' => $pay_description,'user' => $user, 'sum' => $sum])
@overwrite