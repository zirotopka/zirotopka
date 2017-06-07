<div class="modal fade" id="registr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2>Регистрация</h2>
        <div class="user_data" style="height: 350px;">
          <form action="/registration"" method="POST">
            {{ csrf_field() }}
            <p>
              <input class="col-lg-12" id="email" type="email" name="email" placeholder="E-mail" required="required">
              <input class="col-lg-12" id="password" type="password" name="password" placeholder="Пароль" required="required">
              <input class="col-lg-12" id="first_name" type="text" name="first_name" placeholder="Имя" required="required">
              <input class="col-lg-12" id="last_name" type="text" name="last_name" placeholder="Фамилия" required="required"> 
              <input class="col-lg-12" type="tel" id="phone" name="phone" placeholder="Телефон" required="required">
            </p>
            <p>
              <div class="col-lg-6">
                <p>Мужской</p>

                <input type="radio" name="sex" required="required" value="1">
              </div>
              <div class="col-lg-6">
                <p>Женский</p>
                <input type="radio" name="sex" required="required" value="2">
              </div>
            </p>
            <p>
              <input type="checkbox" name="offer">: Я ознакомлен с офертой<br>
              <input type="checkbox" name="adult">: Мне больше 14 <br>
            </p>
            <input class="btn btn-default btn-primary btn-lg" type="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>