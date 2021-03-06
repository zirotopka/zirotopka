<div class="modal fade" id="registr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog reg_modal" role="document">
    <div class="modal-content ">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="/ico/close_modal.png" alt=""></span></button>
        <h3>ПРИСОЕДИНЯЙТЕСЬ!</h3>
        <div class="user_data">
          <form action="/register" method="POST">
            {{ csrf_field() }}
            <input class="reg_input" id="reg-email" type="email" name="email" placeholder="Почта" required="required">
            <input class="reg_input" id="password" type="password" name="password" placeholder="Пароль" required="required">
            <input class="reg_input" id="first_name" type="text" name="first_name" placeholder="Имя" required="required">
            <input class="reg_input" id="surname" type="text" name="surname" placeholder="Фамилия" required="required"> 

            @if (!empty($referral))
              <input type="hidden" name="referer_code" value="{{$referral->slug}}"> 
              <div class="enter_across reg_enter_across">
                <hr>
                <a href="">Вас пригласил</a>
                <hr>
              </div>
              <div>
                @if (!empty($referral->user_ava_url))
                    <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                @else
                    <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                @endif
                <span>{{$referral->surname.' '.$referral->first_name}}</span>
              </div>
            @endif

            <!--
            <div class="enter_across reg_enter_across">
              <hr>
              <a href="#" data-toggle="modal" data-target="#login">или войти через</a>
              <hr>
            </div>
            <div class="vk_fs"> 
              <a href="/social_login/vkontakte">
                <img src="/image/social-networks/icon-vk.png" alt="" align="center" width="36px">
              </a>
            </div>
            !-->
            <input class="registr_btn" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>