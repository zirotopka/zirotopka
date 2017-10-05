@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/lk_balance.css" type="text/css" rel="stylesheet">
    <link href="/assets/privat_account/sidebar.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут --> 
    <script type="text/javascript" src="/assets/privat_account/lk_balance.js"></script>    

@overwrite


@section("content")
	@include('layouts.office_left_menu')
	<!--Balance content-->
	<div class="right_edit_part col-xs-12 col-sm-12 col-lg-10 col-md-10">
		<p class="cnt">МОЙ СЧЕТ</p>
		<div class="row">
			<div class="money ">
				<p>МОЙ СЧЕТ:&nbsp;{{ !empty($user->balance) ? $user->balance->sum : 0 }} 
			</div>			
		</div>
		<?php echo $accruals->render(); ?>
		<div class="table-scrolling col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<table class="table balance_table">
				<thead>
					<tr>
						<th class="hidden-xs tb_nm">№</th>
						<th class="hidden-xs tb_dt">ДАТА</th>
						<th class="hidden-xs tb_tm">ВРЕМЯ</th>
						<th class="tp_trz">ТИП ТРАНЗАКЦИИ</th>
						<th class="tb_znc">НАЗНАЧЕНИЕ</th>
						<th class="tb_sm">СУММА</th>
					</tr>
				</thead>
				<tbody>
						<tr>
							<td class="hidden-xs"></td>
							<td class="hidden-xs"></td>
							<td class="hidden-xs"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					@forelse ($accruals as $accrual)
						<?php $created_at = DateTime::createFromFormat('Y-m-d H:i:s', $accrual->created_at); ?>
						<tr>
							<td class="hidden-xs tb_nm">{{$accrual->id}}</td>
							<td class="hidden-xs tb_dt">{{$created_at->format('Y-m-d')}}</td>
							<td class="hidden-xs tb_tm">{{$created_at->format('H:i:s')}}</td>
							<td class="tp_trz">{{!empty($accrual->type) ? $accrual->type->name : ''}}</td>
							<td class="tb_znc">{{$accrual->comment}}</td>
							<td class="tb_sm">{{number_format($accrual->sum,0,',',' ')}}</td>
						</tr>
					@empty
						<tr>
							<td class="hidden-xs"></td>
							<td class="hidden-xs"></td>
							<td class="hidden-xs"></td>
							<td class="text-center">Транзакции отсутствуют</td>
							<td></td>
							<td></td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
		<div class="blns_btns">
			<button class="replenish_btn" type="button" data-toggle="modal" data-target="#refer-pay">ПОПОЛНИТЬ</button>
			<button class="black_btn" type="button" data-toggle="modal" data-target="#withdrawal_modal">ВЫВЕСТИ</button>
		</div>
	</div>
	@include('privat_office._partials._refer_money_modal',['user' => $user, 'sum' => 0])
	@include('privat_office._partials._withdrawal_modal',['user' => $user])
@overwrite

