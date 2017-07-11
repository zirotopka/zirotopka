<div class="modal fade" id="registr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog reg_modal" role="document">
    <div class="modal-content ">
      <div class="modal-body">
        <h3>ПРИСОЕДИНЯЙТЕСЬ!</h3>
        <div class="user_data">
          <form action="/register"" method="POST">
            {{ csrf_field() }}
            <p>
              <input class="reg_input" id="email" type="email" name="email" placeholder="Почта" required="required">
              <input class="reg_input" id="password" type="password" name="password" placeholder="Пароль" required="required">
            </p>
            <div class="sex_chs col-sm-12 col-xs-12">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 left-sex">
                Выберите пол:
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 right-sex">
                <div class="sex">
                  <input type="radio" name="sex" required="required" value="2" id="fm">
                  <label for="fm"><span></span></label>
                  <p>Ж</p>
                </div>
                <div class="sex">
                  <input type="radio" name="sex" required="required" value="1" id="ml">
                  <label for="ml"><span></span></label>
                  <p>М</p>
                </div>
              </div>
            </div>
            <input class="reg_input" id="first_name" type="text" name="first_name" placeholder="Имя" required="required">
            <input class="reg_input" id="surname" type="text" name="surname" placeholder="Фамилия" required="required"> 
            
            <div class="enter_across reg_enter_across">
              <hr>
              <a href="">или войти через</a>
              <hr>
            </div>
            <div class="vk_fs"> 
              <a href="">
                <img src="/ico/vkontakte.png" alt="">
              </a>
              <a href="">
                <img src="/ico/icon-facebook.svg" alt="">
              </a>
            </div>
            <input class="registr_btn" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>