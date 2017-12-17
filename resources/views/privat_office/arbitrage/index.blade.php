@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
    <link href="/assets/privat_account/arbitrage/lk.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" type="text/css" rel="stylesheet">
@overwrite

@section('js')
    @parent

    <!-- Добавлять js тут -->
<!--     <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-187505-gLyzn';</script> -->
    <!-- <script src="http://vjs.zencdn.net/6.1.0/video.js"></script> -->
    <script type="text/javascript" src="/assets/privat_account/account.js"></script>

    <script>
		var adjansyListDays = JSON.parse('{{ json_encode($adjansyListDays) }}');
		var adjansyListValues = JSON.parse('{{ json_encode($adjansyListValues) }}');
		var accrualsSumPerDay = JSON.parse('{{ json_encode($accrualsSumPerDay) }}');
	</script>

    <script type="text/javascript" src="/assets/privat_account/arbitrage/lk.js?{{time()}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/js/mdb.min.js"></script>
@overwrite


@section("content")
<!--Логотип-->
	<div class="main-content container">
		<div class="panel panel-default arbitrage-panel">
		  <div class="panel-heading text-left">
		  	<span class="border-right"><b>Личный кабинет</b></span>
		  	<span>Реферальная ссылка:</span>
		  	<span class="width-fourhundred color-orange">
		  		<b>{{!empty($user->slug) ? env('APP_URL').'/ref/'.$user->slug : ''}}</b>
		  	</span>
		  </div>
		  <div class="panel-body">
		    <div class="container">
		    	<div class="row">
			    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			    		<label for="lineChartMonth">Количество рефералов за месяц</label>
				    	<canvas id="lineChartMonth"></canvas>
			    	</div>
			    	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			    		<label for="lineChartAccruals">Заработано средств от рефералов</label>
			    		<canvas id="lineChartAccruals"></canvas>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<table class="table table-bordered table-striped">
				    		<thead>
				    			<tr>
				    				<td>Реферал</td>
				    				<td>Дата</td>
				    				<td>Покупка программы</td>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@forelse ($adjansyList as $user)
				    				<tr>
				    					<td>
				    						{{$user->first_name.' '.$user->surname}}
				    					</td>
				    					<td>
				    						{{$user->created_at}}
				    					</td>
				    					<td>
				    						@if (!empty($user->is_programm_pay)) 
				                                Да  <i class="fa fa-check" aria-hidden="true" style="color:#3c763d"></i>
				                            @else
				                                Нет <i class="fa fa-close" aria-hidden="true" style="color:#a94442"></i>
				                            @endif
				    					</td>
				    				</tr>
				    			@empty
				    				<tr>
				    					<td colspan=99 class="text-center">
				    						Сейчас у вас отсутствуют рефералы
				    					</td>
				    				</tr>
				    			@endforelse
				    		</tbody>
				    	</table>
				    </div>
			    </div>
		    </div>
		  </div>
		</div>
	</div>
@overwrite