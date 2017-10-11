@extends('layouts.main')

@section('css')
    @parent
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
@overwrite

@section('js')
    @parent
    <script type="text/javascript" src="/assets/privat_account/modal/coming-soon-modal.js?123"></script>
@overwrite

@section("content")
	@include('privat_office._partials._program_comming_soon_modal',['user' => $user])
@overwrite