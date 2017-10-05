@extends('layouts.main')

@section('css')
    @parent
    <link href="/assets/privat_account/pay-modal.css" type="text/css" rel="stylesheet">
@overwrite

@section('js')
    @parent
    <script type="text/javascript" src="/assets/privat_account/pay-modal.js?123"></script>
@overwrite

@section("content")
	<div class="modal fade" id="pay-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-body">
	                <p class="orang-txt test">ЗАВЕРШЕНИЕ ТЕСТОВОГО ПЕРЕОДА</p>        
	                <p class="gray-text">К сожалению, Ваш тестовый период закончился. <br>Чтобы продолжить участие, необходимо оплатить программу</p>
	                <p class="orang-txt price">2500 РУБ.</p>
	                <form action="{{env('APP_URL').'/privat_office/payProduct/1'}}" method="POST" class="form-horizontal">
						<input name="user_id" type="hidden" value="{{$user->id}}">
						{{ csrf_field() }}
	
	                    <div class="form-group">
	                        <div>
	                          <input type="submit" value="ОПЛАТИТЬ" class="link"/>
	                        </div>
	                    </div>
	                </form>     
	            </div>
	        </div>
	    </div>
	</div>
@overwrite