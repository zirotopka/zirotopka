<div class="modal fade col-sm-12 col-xs-12" id="get_password_form" tabindex="-1" role="dialog" aria-labelledby="get_password_form">
  <div class="modal-dialog password_form" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>ВОССТАНОВЛЕНИЕ ПАРОЛЯ</h4>
        <div class="user_data">
          <form action="{{env('APP_URL').'/get_post_password'}}" method="POST">
            {{ csrf_field() }}
            <input class="password_input" id="email" type="email" name="email" placeholder="Введите e-mail" required="required">
            <input class="password_btn" type="submit" value="Получить пароль">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>