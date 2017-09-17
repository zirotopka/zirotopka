@extends('layouts.main')

@section('css')
    @parent
@overwrite

@section('js')
    @parent

    <script type="text/javascript">
        $(window).on('load',function(){
            $('#set_pass_form').modal('show');
        });
    </script>
@overwrite

@section("content")
  <div class="main-content container-fluid">
    <div class="modal fade" id="set_pass_form" tabindex="-1" role="dialog" aria-labelledby="setPass">
      <div class="modal-dialog chs-program-widnow" role="document">
        <div class="modal-content reg-mod-content">
          <div class="modal-body choose-program-form">
            <form action="/password" method="POST"> 
              {{ csrf_field() }}
              <h1>Создайте пароль</h1>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="password">Введите пароль</label>
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
                  <input type="submit" value="Создать" class="btn btn-success">
                </div>
              </div>
            </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
@overwrite