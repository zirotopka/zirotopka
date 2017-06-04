@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/css/account.css" type="text/css" rel="stylesheet">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->

@overwrite


@section("content")
	<div class="main-content container-fluid">
		<div class="logo col-lg-12">
			<img class="logo-pos" src="R'ONE logo.png" alt="">
			<b>.START</b>
		</div>
		<div class="calendar">
			<div class="day-number">
				<table>
					<tr class="num-cal">
						@for ($i = 1; $i<29; $i++)
							<td>{{$i}}</td>
						@endfor
					</tr>
					<tr >
						@for ($i = 1; $i<29; $i++)
							<td class="box-cal"></td>
						@endfor	
					</tr>
				</table>
			</div>
		</div>
		<div class="programs">
			@for ($i =0; $i<4; $i++)	
				<div class="program col-lg-3">
					<h2>Название Упражнения</h2>
					<br>
					<h3>Количество подходов</h3>
					<p>Описание выполнения упражнения</p>
					<video class="video-descr" src=""></video>
					<div class="otchet">
						<input class="prof-file" type="file">
					</div>
				</div>
			@endfor
		</div>
		<div class="send-proof col-lg-12">
				<button type="submit" class="send-proof-file"> Send Proof</button>
		</div>
	</div>
@overwrite
