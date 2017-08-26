@extends('layouts.main')

@section('css')
    @parent

@overwrite

@section('js')
    @parent

@overwrite

@section("content")
<h1 style="padding-top: 40px">Оплатить программу</h1>
@include('yandex_kassa::form')
@overwrite