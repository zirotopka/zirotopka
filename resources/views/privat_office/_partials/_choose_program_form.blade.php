@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <!-- <link href="http://vjs.zencdn.net/6.1.0/video-js.css" rel="stylesheet"> -->
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
    <!-- <link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet"> -->
@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <!-- <script src="http://vjs.zencdn.net/6.1.0/video.js"></script> -->
    <script type="text/javascript" src="/assets/privat_account/account.js?123"></script>
    <!-- <script src="//vjs.zencdn.net/5.19/video.min.js"></script> -->
@overwrite


@section("content")
  <div class="main-content container-fluid">
    <div class="logo col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <a href="/">
        <img class="logo-pos" src="/ico/R'ONE logo.png" alt="">
        <b>.START</b>
      </a>
    </div>
    <div class="modal fade" id="choose_programe_form" tabindex="-1" role="dialog" aria-labelledby="ProgramModalLabel">
      <div class="modal-dialog chs-program-widnow" role="document">
        <div class="modal-content reg-mod-content">
          <div class="modal-body choose-program-form">
            <form action="/program/choice_programm" method="POST"> 
              {{ csrf_field() }}

    <!-- Left part -->
              <div class="left-progrm-part col-lg-5 col-md-5 col-sm-5 col-xs-5">
                 <p class="prog-bold-txt">ВЫБЕРИТЕ ПРОГРАММУ</p>
                 <div class="cntrt">
                    <img src="/ico/drop-ico.png" alt="" class="ddicc">
                    <br>
                    <select class="selectpicker" name="program_id" id="program_id" >
                      @foreach ($programs as $program)
                        <option value="{{$program->id}}">{{$program->name}} </option>  

                      @endforeach
                    </select>
                </div>
                <br>
              <p class="prog-bold-txt slate">ВЫБЕРИТЕ ДАТУ <br>начала тренировок</p>
              <div class="progr-drop">      
                <div class="select-side" style="height: 2.6em; z-index: 2; margin: 0.2em; ">
                  <img src="/ico/drop-ico.png"></img>
                </div>
                  
                  <input type="text" name="program_date_input" id="program_date_input" class="drp-control progr-dropdowns" required="required" placeholder="Выберите дату">
              </div>
             
              <div class="checkboxiki">
                <ul>
                  <li>
                    <input type="checkbox" id="check1" required> 
                    <label for="check1">
                    </label>
                      <a class="" href="#">Мне больше 14.</a>

                  </li>
                  <li>
                    <input type="checkbox" id="check2" required>
                    <label for="check2">
                    </label>
                      <a class="" href="#">Ознакомился(-ась) с офертой.</a>

                  </li>
                  <li>
                    <input type="checkbox" id="check3" required>    
                    <label for="check3">
                    </label>
                      <a class="" href="#">Ознакомился(-ась) с политикой<br> конфиденциальности.</a>
                  </li>
                </ul>
              </div>
                <input type="submit" value="НАЧАТЬ ПРОБНЫЙ ПЕРИОД" class="send-progr-btn">
              </div>
    <!-- - - - - - - - - - - Right part-------------------------------------!-->
              <div class="right-progrm-part col-lg-7 col-md-7 col-sm-7 col-xs-7">
                  <img alt="" class="prg-img" id="program_bnr" style="display: block;">
                  <div class="righ_prgr_text">
                    <p id="r_prgr_name"></p>
                    <p id="r_prgr_descr"></p>
                    <p id="r_prgr_price">Руб.</p>
                  </div>
              </div>
            </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
@overwrite