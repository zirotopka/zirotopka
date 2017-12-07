@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
    <link href="/assets/privat_account/modal/acc_modal.css" type="text/css" rel="stylesheet">
@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/privat_account/modal/is-pay-modal.js?123"></script>
    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-187506-hB4iq';</script>
@overwrite

@section("content")
	@include('privat_office._partials._program_is_pay_modal',['user' => $user])
@overwrite