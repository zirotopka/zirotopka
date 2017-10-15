<?php
	$newor = '';
	$inpor = '';
	$outor = '';
	if (Request::path() == 'messages/new'){
		$newor = 'orange';
	}
	elseif(Request::path() == 'messages/1'){
		$inpor = 'orange';
	}
	elseif(Request::path() == 'messages/2'){
		$outor = 'orange';
	}
?>
	<div class="little_menu">
		<ul>
			<li class="hidden-xs hidden-sm"></li>
			<a href="/messages/new">	
				<li class="send {{$newor}}">
					<img src="/ico/add_msg.png" alt="" class="add_img">
				</li>
			</a>
			<a href="/messages/2">
				<li class="output {{$outor}}">
					<img src="/ico/input_mess.png" alt="">
				</li>
			</a>
			<a href="/messages/1">
				<li class="input {{$inpor}}">
					<img src="/ico/mess.png" alt="">
				</li>
			</a>
		</ul>		
	</div>
