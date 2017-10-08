<div class="modal fade" id="freezing_form" tabindex="-1" role="dialog" aria-labelledby="freezing_form" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog freezing-widnow" role="document">
    <div class="modal-content">
      <div class="modal-body freez-form">
        <p class="R_lit">R</p>
        <p class="c-orange light_text">ТВОЙ ЛИЧНЫЙ КАБИНЕТ ЗАМОРОЖЕН :(</p>
        <p class="light_text">Вероятнее всего мы не получили отчёт, либо он был выполнен неверно. <br></p>
        
        @if ($user->immunity_count > 0) 
          <p>Чтобы продолжить - просто воспользуйся иммунитетом</p><br>
          <form action="{{env('APP_URL').'/privat_office/useImmunity/'.$user->id}}" method="POST">
            {{ csrf_field() }}
            <input type="submit" value="РАЗБЛОКИРОВАТЬ АККАУНТ" class="forms-btns">
          </form>
          <p>или</p><br>
        @endif
        
        <form action="{{env('APP_URL').'/'.$user->slug.'/immunity_count'}}" method="GET" class="form-horizontal">
          <input type="submit" value="КУПИТЬ ИММУНИТЕТ" class="forms-btns">
        </form>     

        <p class="light_text slim_txt" >Если не согласен,<a href="#"> жми сюда.</a></p>
      </div>
    </div>
  </div>
</div>