@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/privat_account/account.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/video/video-btn.css">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/video/video-btn.js"></script>

@overwrite


@section("content")
	<div class="main-content container-fluid">
		<div class="logo col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="logo-pos" src="/R'ONE logo.png" alt="">
			<b>.START</b>
		</div>
		@if ( !empty($user->current_programm_id) )
			@if ( !empty($programm_days) )
				<div class="calendar">
					<div class="day-number">
						<table class="t-cal">
							<tr class="num-cal">
								@foreach ( $programm_days as $program_day )
									<td>{{$program_day->day}}</td>
								@endforeach
							</tr>
							<tr>
								@foreach ( $programm_days as $program_day )
									@php
										$difficult = $difficult_array[$program_day->difficult];
				
										$class = '';

										if ( !empty($user->current_day) && $user->current_day > $program_day->day ) {
											{{-- Если день пройден --}}
											$class = 'bg-success';
										} else if ( empty($user->current_day) || $user->current_day < $program_day->day ) {
											{{-- Если день не пройден еще --}}
											$class = 'bg-warning';
										} else {
											{{-- Текущий день --}}
											$class = 'bg-info';
										}

									@endphp
									<td class="box-cal {{$class}}">
										@if ($program_day->day == $user->current_day)
											<i class="fa fa-smile-o fa-2x" aria-hidden="true"></i>
										@elseif ( empty($program_day->status) )
											<i class="fa fa-sun-o fa-2x" aria-hidden="true"></i>
										@endif
										<span>
											@if ( !empty($difficult) )
										  		<p class="{{ $difficult['color'] }}">Сложность: {{ $difficult['text'] }}</p>
										  	@else 
												<p>Сложность: - </p>
										  	@endif
										  	<p>Время выполнения:  {{ !empty($program_day->lead_time) ? gmdate('H:i:s' ,$program_day->lead_time) : '-' }}</p>
										</span>
									</td>
								@endforeach	
							</tr>
						</table>
					</div>
				</div>
			@endif
			<div class="programs row">
				@forelse ( $programm_stages as $programm_stage )
					@if ( !empty($programm_stage->exercive) )
						<div class="program col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<form>
								<p class="prog-txt prog-name">{{$programm_stage->exercive->name}}</p>
								@if ( !empty($programm_stage->repeat_count) )
									<p class="prog-txt prog-count">Количество подходов: {{$programm_stage->repeat_count}}</p>
								@endif 
								@if ( !empty($programm_stage->time_exercive) )
									<p class="prog-txt prog-count">Время выполнения: {{ gmdate('H:i:s' ,$programm_stage->time_exercive) }}</p>
								@endif 
								<p class="prog-txt" style="margin-bottom:  2em;">{{$programm_stage->exercive->description}}</p>

								<div id="video_holder">
								    <div id="overlay"></div>
								    @php
								    	$video_model = $programm_stage->exercive->files->first();
								    @endphp
								    @if (!empty($video_model))
										<video class="video-descr" id="tr-video">
											<source src="{{ $video_model->file_url }}" >
										</video>
									@endif
								</div>
								<div class="otchet">
									<input class="prof-file col-lg-4 col-md-4 col-sm-4 col-xs-4" type="file">
									<p class="load-text col-lg-7 col-md-7 col-sm-7 col-xs-7">Загрузить отчёт</p>
								</div>
							</form>
						</div>
					@endif
				@empty
				@endforelse
				<div class="send-proof col-lg-12">
						<button type="submit" class="send-proof-file"> Отправить на проверку</button>
				</div>
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
