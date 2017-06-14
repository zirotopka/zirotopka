@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->

@overwrite

@section("content")
@include('home.registration')
@include('home.login')
@overwrite
