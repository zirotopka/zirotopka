<div class="modal fade" id="refer-pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content bal_modal_height">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="/ico/close_modal.png" alt=""></span></button>
    		<div class="input_money">
    			<p class="add_money">ПОПОЛНИТЬ СЧЕТ</p>
    			@if(isset($pay_description))
    				<p>{{$pay_description}}</p>
    			@endif
    			<input type="text" placeholder="0" class="money_inputs" name="sum" value="{{!empty($sum) ? number_format($sum, 0, '.', ' ') : ''}}" id="sumFront">
    			<form action="{{env('PAYMASTER_URL')}}" method="POST" class="form-horizontal">
    				<input name="LMI_MERCHANT_ID" type="hidden" value="{{env('PAYMASTER_LMI_MERCHANT_ID')}}">
    				<input name="LMI_CURRENCY" type="hidden" value="643">
    				<input name="LMI_PAYMENT_DESC" type="hidden" value="Reformoney">
    				<input name="LMI_PAYER_PHONE_NUMBER" type="hidden" value="{{$user->phone}}">
    				<input name="LMI_PAYER_EMAIL" type="hidden" value="{{$user->email}}">
                	<input name="PAYER_ID" type="hidden" value="{{$user->id}}">	
                	<input name="LMI_PAYMENT_AMOUNT" type="hidden" value="{{!empty($sum) ? $sum : 0}}" class="sumBack">	

                	<input name="LMI_SHOPPINGCART.ITEMS[N].NAME" type="hidden" value="ReferMoney">	
                	<input name="LMI_SHOPPINGCART.ITEMS[N].QTY" type="hidden" value="{{!empty($sum) ? $sum : 0}}" class="sumBack">	
    				<input name="LMI_SHOPPINGCART.ITEMS[N].PRICE" type="hidden" value="1">	
    				<input name="LMI_SHOPPINGCART.ITEMS[N].TAX" type="hidden" value="no_vat">	

                	<input type="submit" value="ПОПОЛНИТЬ" class="send">
            	</form>
			</div>
	  </div>
      </div>
    </div>
  </div>
</div>