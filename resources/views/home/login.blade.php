<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2>Аудентификация</h2>
        <div class="user_data" style="height: 350px;">
          <form action="/login"" method="POST">
            {{ csrf_field() }}
            
            <input class="col-lg-12" id="email" type="email" name="email" placeholder="E-mail" required="required">
            <input class="col-lg-12" id="password" type="password" name="password" placeholder="Пароль" required="required">
           
            <input class="btn btn-default btn-primary btn-lg" type="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>