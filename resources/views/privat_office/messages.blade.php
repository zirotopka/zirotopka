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
                <li style="padding: 0 0 1em 0; 	box-shadow: inset 0 -1px rgba(0,0,0,0.2);">
                            @if (!empty($user->user_ava_url))
                                <img src="{{$user->user_ava_url}}" alt="" class="img-circle">
                            @else
                                <img src="/image/test/user.png" alt="" class="img-circle">
                            @endif                    <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}}</p>
                </li>
                		<button>НАПИСАТЬ</button>
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
		
	</div>
@overwrite

