@extends('layouts.main')

@section('css')
    @parent
@overwrite

@section('js')
    @parent
    <script type="text/javascript" src="/assets/privat_account/modal/immunity-modal.js?123"></script>
@overwrite

@section("content")
  @include('privat_office._partials._immunity_modal',['user' => $user])
@overwrite