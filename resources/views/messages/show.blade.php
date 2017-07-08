<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="message_head">
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
			<img src="/image/logos/default.jpg" alt="" class="user_ava">	
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
	</div>
	@if ($type == 2)
		<form action="/messages/new" class="input_form">
			<textarea name="" id="" cols="30" rows="10" class="send_back" placeholder="Ответить"></textarea>
			<div style="text-align: right;">
				<input type="file" class="add_file" id="add_file">
				<label for="add_file" class="lbl_fl"></label>
				<input type="submit" class="write_button snd_btn" value="Отправить">
			</div>
		</form>
	@endif
</div>