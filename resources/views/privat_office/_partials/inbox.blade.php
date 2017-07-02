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
	@include("privat_office.messages")
	<div class="right_edit_part col-xs-12 col-sm-12 col-lg-12 col-md-12">
		<div class="row i-o_message">
			<div class="col-lg-4 col-md-4"></div>
			<div class="message_list">
				<ul>
					<li>
						<p class="sended">ВХОДЯЩИЕ</p>
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
				<div class="received_message col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="message_head">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
							<img src="/image/logos/default.jpg" alt="" class="user_ava">	
						</div>
						<div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
							<p class="message_sender">Иван Поветкин</p>
							<p class="message_time">12:32</p>
						</div>
					</div>
					<br><br><br>
					<div class="message_cnt">
						<p class="message_theme">Вопрос по упражнению</p>
						<p class="message_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec ex ut nisl volutpat vestibulum. Maecenas condimentum, ligula sit amet pellentesque mollis, justo enim sollicitudin purus, sit amet faucibus nunc diam euismod ex. Donec nibh mauris, commodo quis interdum nec, accumsan vel lorem. Aenean dapibus, neque id ullamcorper eleifend, nibh turpis dictum erat, at varius neque ex non nulla. Maecenas ultricies suscipit dolor nec finibus.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@overwrite
