<div class="modal fade" id="freezing_form" tabindex="-1" role="dialog" aria-labelledby="freezing_form" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog freezing-widnow" role="document">
    <div class="modal-content">
      <div class="modal-body freez-form">
        <p class="R_lit">R</p>
        <p class="c-orange light_text">ТВОЙ ЛИЧНЫЙ КАБИНЕТ ЗАМОРОЖЕН :(</p>
        <p class="light_text">Вероятнее всего мы не получили отчёт, либо он был выполнен неверно. <br>Чтобы продолжить - просто воспользуйся иммунитетом</p>

        <form action="{{env('APP_URL').'/privat_office/payProduct/2'}}" method="POST" class="form-horizontal">
          <input name="user_id" type="hidden" value="{{$user->id}}">
          {{ csrf_field() }}

          <div class="form-group">
              <div>
                <input type="submit" value="КУПИТЬ ИММУНИТЕТ" class="forms-btns"/>
              </div>
          </div>
        </form>     

        <p class="light_text slim_txt" >Если не согласен,<a href="#"> жми сюда.</a></p>
      </div>
    </div>
  </div>
</div>