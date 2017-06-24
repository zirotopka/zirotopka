@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/lk_balance.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут --> 

@overwrite


@section("content")
	<div class="left_edit_part col-xs-5 col-sm-5 col-lg-2 col-md-2">
		<nav>
            <ul>
                <li style="padding: 0 0 1em 0; 	box-shadow: inset 0 -1px rgba(0,0,0,0.2);">
                    @if (!empty($user->user_ava_url))
                        <img src="{{$user->user_ava_url}}" alt="" class="img-circle">
                    @else
                        <img src="/image/test/user.png" alt="" class="img-circle">
                    @endif                    <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}}</p>
	            </li>
                <li>
                	<a href="/lk/{{$user->id}}/edit" class="profile_btns">
	                	<i class="prof_ico prof-disp"></i>
	                	<p class="prof-disp">  ПРОФИЛЬ</p>
	                </a> 
                </li>
	            <li>
	                <a href="/lk/{{$user->id}}/balance" class="profile_btns">
	                	<i class="wallet_ico prof-disp"></i>
	                	<p class="prof-disp">МОЙ СЧЁТ</p>
	                </a> 
	            </li>
            </ul>                
        </nav>
	</div>
	<!--Balance content-->
	<div class="right_edit_part col-xs-7 col-sm-7 col-lg-10 col-md-10">
		<p class="cnt">МОЙ СЧЕТ</p>
		<div class="row">
			<div class="money col-lg-3">
				<p>МОЙ СЧЕТ:&nbsp;{{ !empty($user->balance) ? number_format($user->balance->sum, 0, ',', ' ')  : 0 }}&nbsp;&#8381;</p> 
			</div>
			<div class="col-lg-9">
				<button class="replenish_btn" type="button">ПОПОЛНИТЬ</button>
			</div>			
		</div>
		<div class="table-scrolling">
			<table class="table balance_table">
				<tr>
					<th>№</th>
					<th>ДАТА</th>
					<th>ВРЕМЯ</th>
					<th>ТИП ТРАНЗАКЦИИ</th>
					<th>НАЗНАЧЕНИЕ</th>
					<th>СУММА</th>
				</tr>
			
				@forelse ($accruals as $accrual)
					<?php $created_at = DateTime::createFromFormat('Y-m-d H:i:s', $accrual->created_at); ?>
					<tr>
						<td>{{$accrual->id}}</td>
						<td>{{$created_at->format('Y-m-d')}}</td>
						<td>{{$created_at->format('H:i:s')}}</td>
						<td>{{!empty($accrual->type) ? $accrual->type->name : ''}}</td>
						<td>{{$accrual->comment}}</td>
						<td>{{number_format($accrual->sum,0,',',' ')}}</td>
					</tr>
				@empty
					<tr>
						<td class="text-center">Транзакции отсутствуют</td>
					</tr>
				@endforelse
			</table>
		</div>
		<?php echo $accruals->render(); ?>
	</div>

				
	</div>
@overwrite

