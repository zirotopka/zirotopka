@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/lk_balance.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут --> 
    <script type="text/javascript" src="/assets/privat_account/lk_balance.js"></script>    

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
			<div class="money ">
				<p>МОЙ СЧЕТ:&nbsp;{{ !empty($user->balance) ? $user->balance->sum : 0 }}$</p> 
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
		<div>
			<button class="replenish_btn" type="button" data-toggle="modal" data-target="#balance_motions">ПОПОЛНИТЬ</button>
			<button class="black_btn" type="button" data-toggle="modal" data-target="#balance_motions">ВЫВЕСТИ</button>
		</div>
	</div>
	</div>
<div class="modal fade" id="balance_motions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content bal_modal_height">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="input_money">
			<form action="">
				<p class="add_money">ПОПОЛНИТЬ СЧЕТ</p>
				<input type="text" value="Сумма" class="money_inputs">
	            <select class="selectpicker" name="program_id" id="program_id" >
	                <option value=""></option>  
	            </select>
                <img src="/ico/drop-ico.png" style="z-index: 9999; margin: -4.5em 0 0 13.2em;
"></img>
                <input type="submit" value="ПОПОЛНИТЬ" class="send">
            </form>
		</div>
		<div class="output_money">
			<form action="">
				<p class="add_money">ВЫВЕСТИ СРЕДСТВА</p>
				<input type="text" value="Сумма" class="money_inputs">
	            <select class="selectpicker" name="program_id" id="program_id" >
	                <option value=""></option>  
	            </select>
                <img src="/ico/drop-ico.png" style="z-index: 9999; margin: -4.5em 0 0 13.2em;
"></img>
                <input type="submit" value="ВЫВЕСТИ" class="send">
            </form>
		</div>

      </div>
    </div>
  </div>
</div>

@overwrite

