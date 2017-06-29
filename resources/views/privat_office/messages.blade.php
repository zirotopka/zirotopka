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

	<div class="little_menu">
		<ul>
			<li class="hidden-xs hidden-sm"></li>
			<li class="send">
				<img src="/ico/add_msg.png" alt="" class="add_img">
			</li>
			<li class="input">
				<img src="/ico/mess.png" alt="">
			</li>
			<li class="output">
				<img src="/ico/input_mess.png" alt="">
			</li>
		</ul>		
	</div>
	<div class="right_edit_part col-xs-12 col-sm-12 col-lg-12 col-md-12">
		@include('privat_office._partials.new_message')
		<div class="row i-o_message">
			<div class="col-lg-4 col-md-4"></div>
			<div class="message_list">
				<ul>
					<li>
						<p class="sended">ОТПРАВЛЕННЫЕ</p>
					</li>
					<li class="min_msg_cont">
						<div class="min_left_col col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p class="who_send">Тренер</p>
							<a class="answer_msg">Ответить на вопрос</a>
						</div>
						<div class="min_right_col col-lg-6 col-md-6 col-sm-6 col-xs-6">
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

