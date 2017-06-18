<div class="modal fade" id="choose_programe_form" tabindex="-1" role="dialog" aria-labelledby="ProgramModalLabel">
  <div class="modal-dialog chs-program-widnow" role="document">
    <div class="modal-content">
      <div class="modal-body choose-program-form">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form action="/program/choice_programm" method="POST"> 
          {{ csrf_field() }}
          <div class="left-progrm-part col-lg-6">
          <h3>ВЫБЕРИТЕ ПРОГРАММУ</h3>
          <select name="program_id" id="program_id">
            <option disabled>Выберите программу</option>
            @foreach ($programs as $program )
              <option value="{{$program->id}}">{{$program->name}}</option>            
            @endforeach
          </select>
          <br>
          <h3>ВЫБЕРИТЕ ДАТУ СТАРТА</h3>
          <input type="date" name="program_date_input" id="program_date_input" class="col-lg-12 col-md-12 col-xs-12" required="required">
          <input type="checkbox" class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> <a class="col-lg-8 col-md-8 col-sm-8 col-xs-8" href="#">Мне больше 14.</a>
          <br>
          <input type="checkbox" class="col-lg-2 col-md-2 col-sm-2 col-xs-2" value=""> <a class="col-lg-10 col-md-10 col-sm-10 col-xs-10" href="#">Ознакомился (-ась) с офертой.</a>
          <input type="checkbox" class="col-lg-2 col-md-2 col-sm-2 col-xs-2"> <a class="col-lg-10 col-md-10 col-sm-10 col-xs-10" href="#">Ознакомился (-ась) с политикой конфиденциальности.</a>
          </div>

          <div class="right-progrm-part col-lg-6">
            <img src="" alt="">
            <h3>{{}}</h3>
            <input type="submit" value="Отправить">
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>