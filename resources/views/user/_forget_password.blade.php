@extends('layouts.main')

@section('css')
    @parent
@overwrite

@section('js')
    @parent

    <script type="text/javascript" src="/assets/home/forget-password-modal.js"></script>
@overwrite

@section("content")
  @include('user._forget_password_modal')
@overwrite