@extends('layouts.main')

@section('css')
    @parent
@overwrite

@section('js')
    @parent

    <script type="text/javascript" src="/assets/home/new-password-modal.js"></script>
@overwrite

@section("content")
  @include('user._new_password_modal')
@overwrite