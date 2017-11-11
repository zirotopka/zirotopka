<div class="main-content container-fluid">
  <div class="modal fade" id="forget_pass_form" tabindex="-1" role="dialog" aria-labelledby="setPass">
    <div class="modal-dialog chs-program-widnow" role="document">
      <div class="modal-content reg-mod-content">
        <div class="modal-body choose-program-form">
          <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="/ico/close_modal.png" alt=""></span></button>
          <form action="{{env('APP_URL').'/forget_password'}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="email">Введите e-mail</label>
                  <input type="email" name="email" class="form-control" id="email" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="password_old">Введите старый пароль</label>
                  <input type="password" name="password_old" class="form-control" id="password_old" placeholder="Минимум 6 символов" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="password">Введите новый пароль</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Минимум 6 символов" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="password_confirmation">Повторите пароль</label>
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Повторите пароль" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <input type="submit" value="Обновить" class="btn btn-success">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>