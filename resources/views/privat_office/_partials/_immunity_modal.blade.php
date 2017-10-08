<div class="modal fade" id="immunity-modal" tabindex="-1" role="dialog" aria-labelledby="withdrawal_modal">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content balance_modal_height">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<div class="input_money">
			<p class="add_money">Покупка иммунитетов</p>

			<form action="{{env('APP_URL').'/privat_office/immunityCount/'.$user->id}}" method="POST" class="form-horizontal">
				<input name="user_id" type="hidden" value="{{$user->id}}">
				  {{ csrf_field() }}
				  <input type="number" placeholder="Количество" class="money_inputs" name="immunity_count" value="1" id="sumFront">

          <input type="submit" value="КУПИТЬ" class="send">
      </form>
		</div>
      </div>
    </div>
  </div>
</div>