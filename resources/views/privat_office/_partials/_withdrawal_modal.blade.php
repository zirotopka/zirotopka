@section('js')
    @parent
    <script type="text/javascript" src="/assets/privat_account/modal/cloneSum.js?123"></script>
@overwrite

<div class="modal fade" id="withdrawal_modal" tabindex="-1" role="dialog" aria-labelledby="withdrawal_modal">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content bal_modal_height">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="/ico/close_modal.png" alt=""></span></button>
		<div class="input_money">
			<p class="add_money">ВЫВОД СРЕДСТВ</p>
      <p class="text-center">{{ 'Доступно '.$balance->sum.' руб.' }}</p>

			<input type="text" placeholder="0 руб." class="money_inputs" name="sum" id="sumFront">
			<input name="balanceСonstraints" type="hidden" value="{{ !empty($user->balance) ? $user->balance->sum : 0 }}" id="balanceСonstraints">

			<form action="{{env('APP_URL').'/privat_office/withdrawalFunds/'.$user->id}}" method="POST" class="form-horizontal">
				<input name="user_id" type="hidden" value="{{$user->id}}">
				{{ csrf_field() }}
				<input name="withdrawal_sum" type="hidden" value="0" class="sumBack">

          <input type="submit" value="ВЫВЕСТИ" class="send">
      </form>
		  </div>
      </div>
    </div>
  </div>
</div>