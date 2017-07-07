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
	<div class="new_message col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<p class="new-msg">НОВОЕ СООБЩЕНИЕ</p>
		<form action="">
			<input type="text" placeholder="Тема:" class="msg_theme">
			<br>
			<textarea name="" id="" cols="30" rows="10" placeholder="Ваш текст" class="msg_text"></textarea>
			<div class="send_btn_align">
				<input type="file" class="add_file" id="add_file">
				<label for="add_file" class="lbl_fl"></label>
				<input type="submit" value="ОТПРАВИТЬ" class="write_button msg_sendbutton" >
			</div>
	
		</form>
	</div>
@overwrite
