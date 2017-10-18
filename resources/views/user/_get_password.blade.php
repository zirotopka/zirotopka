<div class="modal fade" id="get_password_form" tabindex="-1" role="dialog" aria-labelledby="get_password_form">
  <div class="modal-dialog chs-program-widnow" role="document">
    <div class="modal-content reg-mod-content">
      <div class="modal-body choose-program-form">
        <form action="{{env('APP_URL').'/get_post_password'}}" method="POST"> 
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
              <input type="submit" value="Получить пароль" class="btn btn-success">
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>