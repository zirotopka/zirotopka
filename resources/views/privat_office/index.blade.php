@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/privat_account/account.css" type="text/css" rel="stylesheet">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/js/video_btns.js"></script>

@overwrite


@section("content")
	<div class="main-content container-fluid">
		<div class="logo col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="logo-pos" src="/R'ONE logo.png" alt="">
			<b>.START</b>
		</div>
		@if ( !empty($user->current_programm_id) )
			<div class="calendar">
				<div class="day-number">
					<table class="t-cal">
						<tr class="num-cal">

							@for ($i = 1; $i<29; $i++)
								<td>{{$i}}</td>
							@endfor
						</tr>
						<tr>
							@for ($i = 1; $i<29; $i++)
								<td class="box-cal">
									<span>
										<p>Уровень сложности:</p>
										<p>Время выполнения:</p>
									</span>
								</td>
							@endfor	
						</tr>
					</table>
				</div>
			</div>
			<form>	
				<div class="programs">
					@for ($i =0; $i<4; $i++)	
						<div class="program col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<p class="prog-txt prog-name">Название Упражнения</p>
							<p class="prog-txt prog-count">Количество подходов</p>
							<p class="prog-txt" style="margin-bottom:  2em;">Описание выполнения упражнения</p>
							<video class="video-descr" id="myvideo" src="/video/trainings/Берпи с отжиманием.mp4"></video>
							<div id="controls">
							    <span id="playpause" class="paused" >Play</span>
							</div>
							<div class="otchet">
								<input class="prof-file col-lg-4 col-md-4 col-sm-4 col-xs-4" type="file">
								<p class="load-text col-lg-7 col-md-7 col-sm-7 col-xs-7">Загрузить отчёт</p>
				<form>	

								</div>
							</div>
						@endfor
					</div>
					<div class="send-proof col-lg-12">
							<button type="submit" class="send-proof-file"> Отправить на проверку</button>
					</div>
				</form>
			</div>		
		@else
			<div class="chose-program col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1>Выберите программу</h1>	
				<div class="chose-prog-container col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3>Программа: <b>ХИЛЯК</b></h3>
					<p>Надоело быть хиляком, устал от насмешек со стороны спортивных товарищей, хочешь отлично прокачаться и слегка подзаработать, закажи программу <b>"ХИЛЯК"</b>. Мы быстро подтянем твои дряблые мышцы.</p>
					<br>
					<br>
					<button style="padding: 1em 4em;"> ЗАКАЗАТЬ</button>
				</div>
				<div class="chose-prog-container col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3>Программа: <b>МАТЁРЫЙ ХИЛЯК</b></h3>
					<p>Наконец прошел программу <b>"ХИЛЯК"</b> и понял, что хочется чего-то большего, тогда программа <b>"МАТЁРЫЙ ХИЛЯК"</b> специально для тебя. С этой программой ты не только сможешь укрепить своё уже не совсем дряблое телье, но и подняться на следующий уровень своего спортивного развития.</p>
					<br>
					<button style="padding: 1em 4em;"> ЗАКАЗАТЬ</button>
				</div>
			</div>
		@endif
	</div>
@overwrite
