@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/css/main.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->

@overwrite

@section("content")
	<div class="swal2-modal"></div>
	@include('home.registration')
	@include('home.login')
@overwrite
