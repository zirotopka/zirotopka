@extends('admin.layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/messages/messages.css" type="text/css" rel="stylesheet">
	<link href="/assets/swiper/swiper.min.css" type="text/css" rel="stylesheet">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/messages/message_admin.js"></script>
	<script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>


@overwrite
@section("content")
	@include("admin.messages.messages")
	<div class="new_message col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<p class="new-msg">НОВОЕ СООБЩЕНИЕ</p>
		<form action="#" id="new_message_form">
			{{ csrf_field() }}
			<input name="recipient_id" type="hidden" value="{{$recipient_id}}">
			<input name="sender_id" type="hidden" value="{{$user->id}}">
			<input name="subject" type="text" placeholder="Тема:" class="msg_theme">
			<br>
			<textarea name="text" id="" cols="30" rows="10" placeholder="Ваш текст" class="msg_text">
			</textarea>
			<div id="attachment-container"></div>
			
		</form>
		<div class="send_btn_align">
			<input type="file" class="add_file" id="add_file" accept="image/x-png,image/gif,image/jpeg,image/*,video/mp4,video/x-m4v,video/*">
			<label for="add_file" class="lbl_fl"></label>
			<input type="button" value="ОТПРАВИТЬ" class="write_button msg_sendbutton" id="send_new_message">
		</div>
	</div>
	
@overwrite
