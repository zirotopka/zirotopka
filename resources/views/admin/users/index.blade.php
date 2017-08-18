@extends('admin.layouts.main')

@section('js')
    @parent

@overwrite

@section("content")

    <ol class="breadcrumb">
        <li><a href="/users">Пользователи</a></li>
    </ol>
    <div class="box-widget widget-module">

        <div class="widget-head clearfix">
            <span class="h-icon"><i class="fa fa-bars"></i></span>
            <h4>Данные пользователя</h4>
        </div>

        <div class="widget-container" style="display: block;">
            <div class="widget-block">
                <div class="tab-content" style="padding-top:20px;">
                    
                </div>
            </div>
        </div>

    </div>

@overwrite

@section('js')
    @parent

@overwrite
