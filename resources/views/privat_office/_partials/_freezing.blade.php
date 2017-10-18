@extends('layouts.main')

@section('css')
    @parent
    <link href="/assets/privat_account/modal/acc_modal.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <script type="text/javascript" src="/assets/privat_account/modal/freezing-modal.js?123"></script>
@overwrite

@section("content")
  @include('privat_office._partials._freezing_modal',['user' => $user])
@overwrite