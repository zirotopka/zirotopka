@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/messages.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/privat_account/message.js"></script>    

@overwrite


@section("content")
	<div class="left_edit_part">
		<nav>
            <ul>
				<li class="write_button_li send">
	           		<button type="button" class="write_button ">НАПИСАТЬ</button>
                </li>
                <li>
                	<a href="#" class="profile_btns input">
	                	<i class="inp_msg_ico prof-disp"></i>
	                	<p class="prof-disp">ВХОДЯЩИЕ</p>
	                </a> 
                </li>
	            <li>
	                <a href="#" class="profile_btns output">
	                	<i class="msg_ico prof-disp"></i>
	                	<p class="prof-disp">ОТПРАВЛЕНЫЕ</p>
	                </a> 
	            </li>
	            <li>
	                <a href="#" class="profile_btns help">
	                	<i class="wallet_ico prof-disp"></i>
	                	<p class="prof-disp">ПОМОЩЬ</p>
	                </a> 
	            </li>
            </ul>                
        </nav>
	</div>
	<div class="col-xs-5 col-sm-5 col-lg-2 col-md-2">
		
	</div>
	<div class="right_edit_part col-xs-7 col-sm-7 col-lg-10 col-md-10">
		@include('privat_office._partials.new_message')
		<div class="row i-o_message">
			<div class="col-lg-4 col-md-4"></div>
			<div class="message_list">
				<ul>
					<li>
						<p class="sended">ОТПРАВЛЕННЫЕ</p>
					</li>
					<li class="min_msg_cont">
						<div class="min_left_col col-lg-6 col-md-6">
							<p class="who_send">Тренер</p>
							<a class="answer_msg">Ответить на вопрос</a>
						</div>
						<div class="min_right_col col-lg-6 col-md-6">
							<p class="when_send">12:23</p>
							<img class="attach_ico" src="/ico/attach_grey.png" alt="">
						</div>
					</li>
				</ul>
			</div>
			<div class="col-lg-8 col-md-8">
				@include('privat_office._partials.message_content')
			</div>
		</div>
	</div>
@overwrite

