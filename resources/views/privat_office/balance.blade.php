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
						<th class="hidden-xs">№</th>
						<th class="hidden-xs">ДАТА</th>
						<th class="hidden-xs">ВРЕМЯ</th>
						<th>ТИП ТРАНЗАКЦИИ</th>
						<th>НАЗНАЧЕНИЕ</th>
						<th>СУММА</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($accruals as $accrual)
						<?php $created_at = DateTime::createFromFormat('Y-m-d H:i:s', $accrual->created_at); ?>
						<tr>
							<td class="hidden-xs">{{$accrual->id}}</td>
							<td class="hidden-xs">{{$created_at->format('Y-m-d')}}</td>
							<td class="hidden-xs">{{$created_at->format('H:i:s')}}</td>
							<td>{{!empty($accrual->type) ? $accrual->type->name : ''}}</td>
							<td>{{$accrual->comment}}</td>
							<td>{{number_format($accrual->sum,0,',',' ')}}</td>
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
			<button class="replenish_btn" type="button" data-toggle="modal" data-target="#balance_motions">ПОПОЛНИТЬ</button>
			<button class="black_btn" type="button" data-toggle="modal" data-target="#balance_motions">ВЫВЕСТИ</button>
		</div>
	</div>
	</div>
<div class="modal fade" id="balance_motions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content bal_modal_height">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

