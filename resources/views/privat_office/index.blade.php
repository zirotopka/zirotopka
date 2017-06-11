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
	<div class="main-content container-fluid">
		<div class="logo col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="logo-pos" src="/ico/R'ONE logo.png" alt="">
			<b>.START</b>
		</div>
		@if ( !empty($user->current_programm_id) )
			@if ( !empty($programm_days) )
				<div class="calendar tooltipstered" data-tooltip-content="#calendar_tooltipe">
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

											<td class="box-cal {{$class}}" style="background-repeat: no-repeat; background-image: url('/ico/sun.png'); background-size: 70% 70%; background-position: center;">
												<span>
													@if ( !empty($difficult) )
												  		<p class="{{ $difficult['color'] }}">Сложность: {{ $difficult['text'] }}</p>
												  	@else 
														<p>Сложность: - </p>
												  	@endif
												  	<p>Время выполнения:  {{ !empty($program_day->lead_time) ? gmdate('H:i:s' ,$program_day->lead_time) : '-' }}</p>
												</span>
											</td>
										@else
											<td class="box-cal {{$class}}">
												<span>
													@if ( !empty($difficult) )
												  		<p class="{{ $difficult['color'] }}">Сложность: {{ $difficult['text'] }}</p>
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
								<div id="video_holder" data-id="{{--*/$video->id/*--}}">
								    <div id="overlay" data-id="{{--*/$overlay->id/*--}}"></div>
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
									<input class="prof-file col-lg-4 col-md-4 col-sm-4 col-xs-4 tooltipstered" data-tooltip-content="#otchet_tooltipe" type="file">
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
			@include('layouts.choose_program_form')
			                                <button type="button" class=" btn btn-primary " data-toggle="modal" data-target="#choose_programe_form">
                                    Войти
                                </button>

		@endif
	</div>
@overwrite
