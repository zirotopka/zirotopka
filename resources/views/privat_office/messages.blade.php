@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/messages.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
@overwrite


@section("content")
	<div class="left_edit_part col-xs-5 col-sm-5 col-lg-2 col-md-2">
		<nav>
            <ul>
				<li class="write_button_li">
	           		<button type="button" class="write_button">НАПИСАТЬ</button>
                </li>
                <li>
                	<a href="/lk/{{$user->id}}/eidt" class="profile_btns">
	                	<i class="inp_msg_ico prof-disp"></i>
	                	<p class="prof-disp">ВХОДЯЩИЕ</p>
	                </a> 
                </li>
	            <li>
	                <a href="/lk/{{$user->id}}/balance" class="profile_btns">
	                	<i class="msg_ico prof-disp"></i>
	                	<p class="prof-disp">ОТПРАВЛЕНЫЕ</p>
	                </a> 
	            </li>
	            <li>
	                <a href="/lk/{{$user->id}}/balance" class="profile_btns">
	                	<i class="wallet_ico prof-disp"></i>
	                	<p class="prof-disp">ПОМОШЬ</p>
	                </a> 
	            </li>
            </ul>                
        </nav>
	</div>
	<div class="right_edit_part col-xs-7 col-sm-7 col-lg-10 col-md-10">
		@include('privat_office._partials.sended_message')
		@include('privat_office._partials.new_message')
		@include('privat_office._partials.received_message')

	</div>
@overwrite

