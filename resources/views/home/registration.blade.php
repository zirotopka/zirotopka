<div class="modal fade" id="registr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog reg_modal" role="document">
    <div class="modal-content ">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3>ПРИСОЕДИНЯЙТЕСЬ</h3>
        <div class="user_data">
          <form action="/register"" method="POST">
            {{ csrf_field() }}
            <p>
              <input class="reg_input" id="email" type="email" name="email" placeholder="E-mail" required="required">
              <input class="reg_input" id="password" type="password" name="password" placeholder="Пароль" required="required">
              <input class="reg_input" id="first_name" type="text" name="first_name" placeholder="Имя" required="required">
              <input class="reg_input" id="surname" type="text" name="surname" placeholder="Фамилия" required="required"> 
              <input class="reg_input" type="tel" id="phone" name="phone" placeholder="Телефон" required="required">
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
              <input type="checkbox" name="offer" class="check">: Я ознакомлен с офертой<br>
              <input type="checkbox" name="adult" class="check">: Мне больше 14 <br>
            </p>
            <input class="btn btn-default btn-primary btn-lg" type="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>