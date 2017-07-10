<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mess_cont">
	<div class="message_head">
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
			<img src="{{ !empty($message->outputs) && !empty($message->outputs->user_ava_url) ? '/image/logos/'.$message->outputs->user_ava_url : '/image/logos/default.jpg' }}" alt="" class="user_ava">	
		</div>
		<div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
			<p class="message_sender">{{!empty($message->outputs) ? $message->outputs->first_name.' '.$message->outputs->last_name : 'Неизвестный отправитель'}}</p>
			<p class="message_time">{{Carbon\Carbon::parse($message->created_at)->format('m-d')}}</p>
		</div>
	</div>
	<br><br><br>
	<div class="message_cnt">
		<p class="message_theme">{{$message->subject}}</p>
		<p class="message_text">{{$message->text}}</p>
		@if(count($message->file) > 0)
			@foreach($files as $file)
				<a href="{{$file->img}}" data-lightbox="roadtrip"></a>
			@endforeach
		@endif
	</div>
	@if ($type == 2)
		<form action="#" id="new_message_form">
			{{ csrf_field() }}
			<input name="recipient_id" type="hidden" value="1">
			<input name="sender_id" type="hidden" value="{{$user->id}}">
			<input name="subject" type="hidden" value="{{$message->subject}}">
			<br>
			<textarea name="text" id="" cols="30" rows="10" class="send_back" placeholder="Ответить"></textarea>
			<div id="attachment-container"></div>
			
		</form>
		<div style="text-align: right;">
			<input type="file" class="add_file" id="add_file" accept="image/x-png,image/gif,image/jpeg,image/*,video/mp4,video/x-m4v,video/*">
			<label for="add_file" class="lbl_fl"></label>
			<input type="button" class="write_button snd_btn" value="Отправить" id="send_new_message">
		</div>
	@endif
</div>