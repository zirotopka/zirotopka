<div class="modal fade" id="choose_programe_form" tabindex="-1" role="dialog" aria-labelledby="ProgramModalLabel">
  <div class="modal-dialog chs-program-widnow" role="document">
    <div class="modal-content">
      <div class="modal-body choose-program-form">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form action="/program/choice_programm" method="POST"> 
          {{ csrf_field() }}
          <div class="left-progrm-part col-lg-5">
            <p class="prog-bold-txt">ВЫБЕРИТЕ ПРОГРАММУ</p>
            <img src="/ico/drop-ico.png" alt="" class="ddicc">
            <select class="selectpicker" name="program_id" id="program_id" >
              @foreach ($programs as $program )
                <option value="{{$program->id}}">{{$program->name}} </option>  

              @endforeach
            </select>
            
            <br>
          <p class="prog-bold-txt slate">ВЫБЕРИТЕ ДАТУ начала тренировок</p>
          <div class="progr-drop">      
            <div class="select-side" style="height: 2.6em; z-index: 2; margin: 0.2em; ">
              <img src="/ico/drop-ico.png"></img>
            </div>
              <input type="text" name="program_date_input" id="program_date_input" class="drp-control progr-dropdowns col-lg-12 col-md-12 col-xs-12" required="required">
          </div>
         
          <div class="checkboxiki">
            <ul>
              <li>
                <input type="checkbox" class=""> <a class="" href="#">Мне больше 14.</a>
              </li>
              <li>
                <input type="checkbox" class=""> <a class="" href="#">Ознакомился (-ась) с офертой.</a>
              </li>
              <li>
                <input type="checkbox" class=""> <a class="" href="#">Ознакомился (-ась) с политикой конфиденциальности.</a>                
              </li>
            </ul>
          </div>
            <input type="submit" value="Отправить">
          </div>
<!-- - - - - - - - - - - Right part-------------------------------------!-->
          <div class="right-progrm-part col-lg-7">
              <img alt="" class="prg-img" id="program_bnr" style="display: block;">
              <p id="r_prgr_name"></p>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>