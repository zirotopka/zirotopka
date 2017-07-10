@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/messages/messages.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/messages/message.js"></script>    

@overwrite
@section("content")
	@include("messages.messages")
	<div class="right_edit_part col-xs-12 col-sm-12 col-lg-12 col-md-12">
		<div class="row i-o_message">
			<div class="col-lg-4 col-md-4"></div>
			<div class="message_list">
				<ul>
					<li>
						<p class="sended">{{ ($type == 1) ? 'ОТПРАВЛЕННЫЕ' : 'ВХОДЯЩИЕ' }}</p>
					</li>
					@forelse ($messages as $message)
						<li class="min_msg_cont show-message" data-type="{{$type}}" data-id="{{$message->id}}">
							<div class="min_left_col col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<p class="who_send">{{!empty($message->outputs) ? $message->outputs->first_name.' '.$message->outputs->last_name : 'Неизвестный отправитель'}}</p>
								<a class="answer_msg" href="/messages/new">Ответить на вопрос</a>
							</div>
							<div class="min_right_col col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<p class="when_send">{{Carbon\Carbon::parse($message->created_at)->format('m-d')}}</p>
								<img class="attach_ico" src="/ico/attach_grey.png" alt="">
							</div>
						</li>
					@empty
					@endforelse
				</ul>
			</div>
			<div class="col-lg-8 col-md-8" id="show-message-container">
			</div>
		</div>
	</div>
@overwrite
