@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/css/modal.css" type="text/css" rel="stylesheet">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->

@overwrite

@include('home.registration', [])
@include('home.login', [])