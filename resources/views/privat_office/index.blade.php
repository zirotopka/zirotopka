@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/video-btn.css">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/js/video-btn.js"></script>

@overwrite


@section("content")
<!--Логотип-->
	<div class="main-content container-fluid">
		<div class="logo col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="logo-pos" src="/ico/R'ONE logo.png" alt="">
			<b>.START</b>
		</div>
<!--Календарь-->
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
									
										@if ( empty($program_day->status) )

											<td class="box-cal {{$class}}" style="background-repeat: no-repeat; background-image: url('/ico/sun.png'); background-size: 2em 2em; background-position: center;">
												<span>
													<h3>Ура выходной!!!</h3>
												</span>
											</td>
										@else
											<td class="box-cal {{$class}}">
												<span>
													@if ( !empty($difficult) )
												  		<p class="{{ $difficult['color'] }}">Уровень сложности: {{ $difficult['text'] }}</p>
												  	@else 
														<p>Сложность: - </p>
												  	@endif
												  	<p>Время выполнения:  {{ !empty($program_day->lead_time) ? gmdate('H:i:s' ,$program_day->lead_time) : '-' }}</p>
												</span>
											</td>
										@endif
												
								@endforeach	
							</tr>
						</table>
					</div>
				</div>
			@endif
<!--Описание программ-->
			<div class="programs row">
				@forelse ( $programm_stages as $programm_stage )
					@if ( !empty($programm_stage->exercive) )
						<div class="program col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<form class="prog-form">
								<div class="row prog-txt-container">	
									<p class="prog-txt prog-name">{{$programm_stage->exercive->name}}</p>
									@if ( !empty($programm_stage->repeat_count) )
										<p class="prog-txt prog-count">Количество подходов: {{$programm_stage->repeat_count}}</p>
									@endif 
									@if ( !empty($programm_stage->time_exercive) )
										<p class="prog-txt prog-count">Время выполнения: {{ gmdate('H:i:s' ,$programm_stage->time_exercive) }}</p>
									@endif 
									<p class="prog-txt prog-descr"> {{$programm_stage->exercive->description}}</p>
								</div>
<!--VIDEO-->
								<div class="row video_holder">
									<button type="button" class="video-btn" data-toggle="modal" data-target="#video-moadl">
										<img class="btn-play" src="/ico/play.png" alt="">
									</button>
									
									<div class="modal fade" id="video-moadl" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog modal-lg" role="document">
									    <div class="modal-content">
									      <div class="video-modal modal-body">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										        <span aria-hidden="true">
										        	<img src="/ico/close.png" alt="">	
										        </span>
									        </button>
										    @php
										    	$video_model = $programm_stage->exercive->files->first();
										    @endphp
										    @if (!empty($video_model))
												<video class="video-descr" controls >
													<source src="{{ $video_model->file_url }}" >
												</video>
											@endif											
									      </div>
									    </div>
									  </div>
									</div>
								</div>
								<div class=" row otchet">
									<div class="load-btn">
										<img class="load" src="/ico/load.png" alt="">
										<p class="load-text">Загрузить отчёт</p>
									</div>
									<input class="prof-file " type="file">
								</div>

							</form>
						</div>
					@endif
				@empty
				@endforelse
			</div>		
				<div class="send-proof col-lg-12">
						<button type="submit" class="send-proof-file"> Отправить на проверку</button>
				</div>
		@else
			@include('layouts.choose_program_form')

		@endif
	</div>
@overwrite
