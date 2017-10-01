@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <!-- <link href="http://vjs.zencdn.net/6.1.0/video-js.css" rel="stylesheet"> -->
    <link href="//vjs.zencdn.net/5.4.6/video-js.css" rel="stylesheet">
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/video-btn.css">

    <!-- <link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet"> -->
@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <!-- <script src="http://vjs.zencdn.net/6.1.0/video.js"></script> -->
    <script type="text/javascript" src="/assets/privat_account/account.js?123"></script>
    <script type="text/javascript" src="/assets/js/video-btn.js?123"></script>
    <script type="text/javascript" src="/assets/js/video.js?{{ time() }}"></script>
    <script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
    <!-- <script src="//vjs.zencdn.net/5.19/video.min.js"></script> -->
@overwrite


@section("content")
	@include('privat_office._partials._freezing_modal')
	@include('privat_office._partials._start_programm_form')

<!--Логотип-->
	<div class="main-content container-fluid">
		<div class="logo col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<a href="/">
				<img class="logo-pos" src="/ico/R'ONE logo.png" alt="">
				<b>.START</b>
			</a>
		</div>
<!--Календарь-->
		
		@if ( !empty($programm_days) )
			@php
				$start_class_key = 0;
				if ( !empty($user->current_day) ) {
					$start_class_key = $user->current_day;
				}
			@endphp
			<div class="calendar">
				<div class="day-number">
					<table class="t-cal">
						<tr class="num-cal">
							@foreach ( $programm_days as $program_day )
								@php
									$cal_class = '';
									if ( $program_day->day < $start_class_key || $program_day->day > ( $start_class_key + 7 ) ) {
										$cal_class = 'hidden-xs hidden-sm';
									}
								@endphp
									
								<td class="{{$cal_class}}">{{$program_day->day}}</td>
							@endforeach
						</tr>
						<tr>
							@foreach ( $programm_days as $program_day )
								<?php
									if (!empty($program_day->difficult)) {
										$difficult = $difficult_array[$program_day->difficult];
										$emp_star= 3 - $program_day->difficult;
									} else {
										$difficult = 0;
										$emp_star= 3;
									}
								?>

								@php
									$cal_class = '';
									if ( $program_day->day < $start_class_key || $program_day->day > ( $start_class_key + 7 ) ) {
										$cal_class = 'hidden-xs hidden-sm';
									}
			
									$class = '';

									if ( !empty($user->current_day) && $user->current_day > $program_day->day ) {
										{{-- Если день пройден --}}
										$class = 'bg-success';
									} else if ( empty($user->current_day) || $user->current_day < $program_day->day ) {
										{{-- Если день не пройден еще --}}
										$class = 'bg-warning' 
										 ;
									} else {
										{{-- Текущий день --}}
										$class = 'bg-info';
									}

								@endphp
								
								@if ( empty($program_day->status) && !in_array($program_day->day,[1,2]) )

									<td class="box-cal {{$class}} {{$cal_class}}" style="background-repeat: no-repeat; background-image: url('/ico/sun.png'); background-size: 2em 2em; background-position: center;">
										<span class="cal_hints outlet">
											<p>Ура выходной!!!</p>
										</span>
									</td>
								@else
									<td class="box-cal {{$class}} {{$cal_class}}">
										<span class="cal_hints">
											@if ( !empty($difficult) )
												@if ($program_day->interest == 1)
													<p style="text-align: center; margin-right: 10%;">Обязательный день</p>
										  		@else
													<p style="text-align: center; margin-right: 10%;">Необязательный день</p>
										  		@endif
										  		<p class="" style="display: inline-block; width: 65%;">Уровень сложности:</p>
										  		<div style="display: inline-block; text-align: center; width: 30%">
														@for ($i=0;$i<$program_day->difficult;$i++)
															<i class="fa fa-star"></i>
															<!--<img src="/ico/full-star.png" alt="">-->
											  			@endfor
														@for ($i=0;$i<$emp_star;$i++)
															<i class="fa fa-star-o"></i>
															<!--<img src="/ico/star.png" alt="">-->
											  			@endfor
												</div>
										  	@else 
												<p>Сложность: - </p>
										  	@endif
										  	<p style="display: inline-block; width: 65%;">Продолжительность тренировки:</p><div style="display: inline-block; text-align: center; width: 30%; vertical-align: top;">~{{ $program_day->lead_time}}</div>
										</span>
									</td>
								@endif
											
							@endforeach	
						</tr>
						<tr>

							@foreach ( $programm_days as $program_day )
								@php
									$cal_class = '';
									if ( $program_day->day < $start_class_key || $program_day->day > ( $start_class_key + 7 ) ) {
										$cal_class = 'hidden-xs hidden-sm';
									}
									$program_day->day=$program_day->day-1;
								@endphp
									
								<td class="cal_date {{$cal_class}}">{{Carbon\Carbon::parse($user->start_training_day)->addDays($program_day->day)->format('d/m')}}</td>
							@endforeach
						</tr>
					</table>
				</div>
			</div>
		@endif
<!--Описание тренировок и питания-->
		<div class="feed_and_train col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="training_descr fd_dscr_blk col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="feed_orange">ОПИСАННИЕ ТРЕНИРОВКИ</p>
				<p class="feed_text">{{$current_program_day->description}}</p>
			</div>
			<div class="training_feed fd_dscr_blk col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<p class="feed_gray">ПЛАН ПИТАНИЯ</p>
				<p class="feed_text">{{$current_program_day->feed}}</p>
			</div>
		</div>

<!--Описание программ-->

		@if(!empty($programm_stages))
			<div class="programs row">
				@forelse ( $programm_stages as $programm_stage )
					@php
				    	$exercive = $programm_stage->exercive;
				    @endphp
					@if ( !empty($exercive) )
						<div class="program col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<form class="prog-form">
								<div class="prog-txt-container">	
									<p class="prog-txt prog-name">{{$exercive->name}}</p>
									@if ( !empty($programm_stage->repeat_count) )
										<p class="prog-txt prog-count">Количество подходов: {{$programm_stage->repeat_count}}</p>
									@endif 
									@if ( !empty($programm_stage->time_exercive) )
										<p class="prog-txt prog-count">Время выполнения: {{ gmdate('H:i:s' ,$programm_stage->time_exercive) }}</p>
									@endif 
									<p class="prog-txt prog-descr" style="margin-bottom:  2em;">{{$exercive->description}}</p>
								</div>
<!--VIDEO-->
								<div class="video_holder" data-id="{{$exercive->id}}">
									<?php
								    	$preview = $exercive->previews->first();

								    	if (!empty($preview)) {
								    		$previewUrl = $preview->file_url;
								    	} else {
								    		$previewUrl = '/image/preview/r.one_start.png';
								    	}
								    ?>
							    	<img src="{{ $previewUrl }}" alt="" style="width: 100%;">
							    	<div class="mask"></div>
							    	<img class="btn-play" src="/ico/play.svg" alt="">
								</div>
								<div class="otchet" data-programm-stage="{{$programm_stage->id}}">
									<div class="attachment-container"></div>
									<div class="otch_hover">
										<div class="load-btn">
											<img class="load" src="/ico/load.png" alt="">
											<p class="load-text">Загрузить отчёт</p>
										</div>
										<input class="prof-file add_file" type="file" title="Загрузить отчёт" accept="image/x-png,image/gif,image/jpeg,image/*,video/mp4,video/x-m4v,video/*">
									</div>
								</div>
									<!-- <input class="prof-file tooltipstered" data-tooltip-content="#otchet_tooltipe" type="file">
								</div>
									<p class="load-text">Загрузить отчёт</p> -->
							</form>
						</div>
					@endif
				@empty
				@endforelse
			</div>		
			<div class="send-proof col-lg-12">
				<button class="send-proof-file" id="send-proof-file"> Отправить на проверку</button>
			</div>

			<!-- --------------------------------------------------------------- -->
			<div class="modal fade" id="video-modal" modali-backdrop="true" tabindex="1" role="dialog" aria-labelledby="videoModal">
			  <div class="display-inline width-eight-perc" role="document">
			    <div class="modal-content">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        <span aria-hidden="true">
					        	<img src="/ico/close.png" alt="">	
					        </span>
				        </button>
						<div class="video-js-responsive-container vjs-hd" style="width:80%">
							<video id="training-video" class="video-js vjs-default-skin"
							  controls preload="auto"
							  data-setup='{"responsive": true,"example_option":true}'>
							 <source src="" type="video/ogg">
							</video>
						</div>
			      </div>
			    </div>
			  </div>
			</div>
		@endif
	</div>
	<!-- <div class="video-js-responsive-container vjs-hd" style="width:80%">
		<video id="training-video" class="video-js vjs-default-skin"
		  controls preload="auto"
		  poster="http://video-js.zencoder.com/oceans-clip.png"
		  data-setup='{"responsive": true,"example_option":true}'>
		 <source src="" type="video/ogg">
		</video>
	 </div> -->
@overwrite