<div class="modal fade col-sm-12 col-xs-12" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog login_form" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="/ico/close_modal.png" alt=""></span></button>
        <h4 >{{!empty($title) ? $title : 'ВХОД'}}</h4>
        <div class="user_data">
          <form action="/login" method="POST">
            {{ csrf_field() }}
            <input class="login_input" id="email" type="email" name="email" placeholder="Почта" required="required">
            <input class="login_input" id="password" type="password" name="password" placeholder="Пароль" required="required">
  
            <input class="login_btn" type="submit" value="ВОЙТИ">
          </form>
          <a href="" id="open_reg" data-toggle="modal" data-target="#registr">Зарегистрироваться!</a>
          <a href="#" data-toggle="modal" data-target="#get_password_form">Забыли пароль?</a>
          <!--
          <div class="enter_across">
            <hr>
            <a href="#">или войти через</a>
            <hr>
          </div>
          <div class="vk_fs"> 
            <a href="/social_login/vkontakte">
              <img src="/image/social-networks/icon-vk.png" alt="" align="center" width="36px">
            </a>
          </div>
          !-->
        </div>
      </div>
    </div>
  </div>
</div>