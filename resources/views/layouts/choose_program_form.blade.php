<div class="modal fade" id="choose_programe_form" tabindex="-1" role="dialog" aria-labelledby="ProgramModalLabel">
  <div class="modal-dialog" role="document">
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
          <h3>ВИБЕРИТЕ ДАТУ СТАРТА</h3>
          <input type="text" name="program_date_input" id="program_date_input" required="required">
          </div>
          
          <div class="right-progrm-part col-lg-6">
            <input type="submit" value="Отправить">
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>