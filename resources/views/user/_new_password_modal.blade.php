<div class="main-content container-fluid">
  <div class="modal fade" id="new_pass_form" tabindex="-1" role="dialog" aria-labelledby="new_pass_form">
    <div class="modal-dialog chs-program-widnow" role="document">
      <div class="modal-content reg-mod-content">
        <div class="modal-body choose-program-form">
          <form action="{{env('APP_URL').'/new_post_password'}}" method="POST"> 
            {{ csrf_field() }}
            <input type="hidden" name="code" value="{{$code}}">
            <input type="hidden" name="id" value="{{$user->id}}">

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