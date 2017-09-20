@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/home/reg-log_form.css" type="text/css" rel="stylesheet">
    <link href="//vjs.zencdn.net/5.4.6/video-js.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/video-btn.css">
    <link href="/assets/programs/programs.css" type="text/css" rel="stylesheet">
    <link href="/assets/swiper/swiper.min.css" type="text/css" rel="stylesheet">


@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>
    <script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
    <script type="text/javascript" src="/assets/programs/programs.js"></script>


@overwrite

@section("content")
    <div class="container-fluid" >
        @include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>   
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
        @if ($user = Sentinel::check())
          @php
              $class = '';
              $class = 'rg_check_in';
          @endphp
            <div class="{{$class}} rstart-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="frs-left col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="rstart-logo">
                        <img src="/ico/R'ONE logo.png" alt="">
                        <p> START</p>
                    </div>
                    <div class="rstart-txt-cnt col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <div class="for_whm">
                            <p>ДЛЯ КОГО</p>
                            <img src="/ico/14+.svg">
                        </div>
                        <p class="rst_ctn">
                            {{$program->description}}
                        </p>
                        <button type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button>
                    </div>
                    <div class="rstart-img-cnt col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <img src="/ico/easy_lvl.svg" class="frs_imgs">
                        <p>начальный уровень</p>
                        <br>
                        <img src="/ico/woman.svg" class="sex frs_imgs">
                        <img src="/ico/man.svg" class="sex frs_imgs">
                        <p>для женщин и мужчин</p>
                        <img src="/ico/butt.svg" class="frs_imgs">
                        <p>для похудения<br>и поддержания формы</p>
                    </div>
                </div>
                <img src="/ico/prstart.jpg" class="hidden-xs col-sm-5 col-md-5 col-lg-5 startimg">
            </div>

        @else
            <div id="st-trigger-effects" class="hidden-md hidden-lg">
                <button data-effect="st-effect-2" class="cdr-btn">
                    <img src="/ico/menu.svg" alt="" style="width: 3.5vw;">
                </button>
            </div>
            <div class="rstart-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="frs-left col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="rstart-logo">
                        <img src="/ico/R'ONE logo.png" alt="">
                        <p> START</p>
                    </div>
                    <div class="rstart-txt-cnt col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <div class="for_whm">
                            <p>ДЛЯ КОГО</p>
                            <img src="/ico/14+.svg">
                        </div>
                        <p class="rst_ctn">
                            {{$program->description}}
                        </p>
                        <button type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button>
                    </div>
                    <div class="rstart-img-cnt col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <img src="/ico/easy_lvl.svg" class="frs_imgs">
                        <p>начальный уровень</p>
                        <br>
                        <img src="/ico/woman.svg" class="sex frs_imgs">
                        <img src="/ico/man.svg" class="sex frs_imgs">
                        <p>для женщин и мужчин</p>
                        <img src="/ico/butt.svg" class="frs_imgs">
                        <p>для похудения<br>и поддержания формы</p>
                    </div>
                </div>
                <img src="/ico/prstart.jpg" class="hidden-xs col-sm-5 col-md-5 col-lg-5 startimg">
            </div>
        @endif
            <div class="tcount-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="prgr_name_st">START</p>
                <div class="pdd col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">{{$program->days}}</p>
                    <p class="tc_t">ДНЕЙ</p>
                </div>
                <div class="pdd col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">{{$program->trainings}}</p>
                    <p class="tc_t">ОБЯЗАТЕЛЬНЫХ ТРЕНИРОВОК</p>
                </div>
                <div class="pdd col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">{{$program->day_off}}</p>
                    <p class="tc_t">ВЫХОДНЫХ</p>
                </div>
                <div class="pdd col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">{{$program->tasks}}</p>
                    <p class="tc_t">НЕОБЯЗАТЕЛЬНЫХ ТРЕНИРОВОК</p>
                </div>
            </div>
            <hr>
            <div class="info-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>ПРИМЕРЫ УПРАЖНЕНИЙ</h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            <div class="video_slide col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <div class="bbrdr">
                                    <div class="sw_shader"></div>
                                    <img src="/image/preview/отжимания-от-пола.jpg" alt="" class="comm_img_hldr video_holder" >
                                    <img src="/ico/play.svg" alt="" class="ico_play1 comm_pl_hldr" data-id="">
                                    <p class="upr_d">Отжимания от пола - одно из наиболее эффективных спортивных упражнений.</p>
                                </div>
                            </div>
                            <div class="content-slide col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                <p class="cs-head">ОТЖИМАНИЯ ОТ ПОЛА</p>
                                <p></p>
                                <button type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button> 
                            </div>
                        </div>
                        <div class="swiper-slide col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            <div class="video_slide col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <div class="bbrdr">
                                    <div class="sw_shader"></div>
                                    <img src="/image/preview/ягодичный-мост.jpg" alt="" class="comm_img_hldr video_holder" >
                                    <img src="/ico/play.svg" alt="" class="ico_play2 comm_pl_hldr" data-id="">
                                    <p class="upr_d">Ягодичный мостик – локальное упражнение на ягодицы.</p>
                                </div>
                            </div>
                            <div class="content-slide col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                <p class="cs-head">ЯГОДИЧНЫЙ МОСТ</p>
                                <p></p>
                                <button type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button> 
                            </div>
                        </div>
                        <div class="swiper-slide col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            <div class="video_slide col-xs-12 col-sm-7 col-md-7 col-lg-7">
                                <div class="bbrdr">
                                    <div class="sw_shader"></div>
                                    <img src="/image/preview/присед+выпад-назад.jpg" alt="" class="comm_img_hldr video_holder" >
                                    <img src="/ico/play.svg" alt="" class="comm_pl_hldr ico_play3" data-id="">

                                    <p class="upr_d">Делаем плавные и чёткие движения</p>
                                </div>
                            </div>
                            <div class="content-slide col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                <p class="cs-head">ПРИСЕД + ВЫПАД НАЗАД</p>
                                <p></p>
                                <button type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button> 
                            </div>
                        </div>         
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <hr>
            <div class="ruls-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>ПРАВИЛА</h2>
                <p>Выполнение заданий подтверждается только с помощью отчёта в форме видео<br class="visible-xs"> или принтскрина экрана.<br class="hidden-xs"> Поэтому для того чтобы принять участие в проекте  Вам понадобится:</p>
                <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img src="/ico/responsive.svg" alt="">
                    <p class="img-txt">Пк, телефон<br>или планшет</p>
                </div>
                <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img src="/ico/worldwide .svg" alt="">
                    <p class="img-txt">Интернет</p>
                </div>
                <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img class="snick" src="/ico/sneaker-for-running.svg" alt="">
                    <p class="img-txt snick-txt">Пара кроссовок</p>
                </div>
                <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <img src="/ico/smile.svg" alt="">
                    <p class="img-txt">Хорошее<br>настроение</p>
                </div>
            </div>
            <div class="connect-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_8">
                <div  class="connect_screen_shader">
                    <p>REFORMATOR</p>
                </div>
                <div class="connect_content">
                    <p class="connect">ПРИСОЕДИНИТЬСЯ!</p>
                    <p class="connect_info">ПОЛУЧИТЬ ДОСТУП К ПЛАТФОРМЕ REFORMATOR.ONE <br>В ТЕЧЕНИЕ ТЕСТОВОГО ПЕРИОДА СОВЕРШЕННО БЕСПЛАТНО</p>
                    <p class="connect_price">2500 руб. <b>0 руб.</b></p>
                    <button class="connect_btn" type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button>
                </div>                
            </div>
            <footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mission">
                    <img src="/ico/min-logo.svg" alt="">
                    <p>наша миссия<br>
                    в повышении качества жизни<br>
                    общества через вовлечение<br>
                    широкого круга населения<br>
                    в любительский спорт и зож</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 prgrm_list">
                    <ul>
                        <li><a href="#">R.ONE START</a></li>
                        <li><a href="#">R.ONE PRO</a></li>
                        <li><a href="#">R.ONE RUNNER</a></li>
                        <li><a href="#">R.ONE RUNNER +</a></li>
                        <li><a href="#">R.ONE POWER</a></li>
                        <li class="bonus"><a href="/bonus" >БОНУСНАЯ<br>
                         ПРОГРАММА</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 reg_f_s">
                    <ul class="rgese">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#registr">РЕГИСТРАЦИЯ</a>
                        </li>
                        <li class="accsss">
                            <a href="#" data-toggle="modal" data-target="#registr">ПОЛУЧИТЬ ДОСТУП<br>К БЕСПЛАТНОМУ КУРСУ</a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/ico/fb.png" alt="">
                            </a>
                            <a href="#">
                                <img src="/ico/vk.png" alt="">
                            </a>
                            <a href="#">
                                <img src="/ico/inst.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>        
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ofrta">
                    <ul>
                        <li class="prtnrs">
                            <a href="#" data-toggle="modal" data-target="#partners">ПАРТНЕРСКОЕ СОГЛАШЕНИЕ</a>
                        </li>
                        <li id="pltks">
                            <a href="#" data-toggle="modal" data-target="#user_agreements">ПОЛЬЗОВАТЕЛЬСКОЕ<br>СОГЛАШЕНИЕ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="color:#737272" class="ip">ИП Санджиева Фаина Санджаевна, ОГРНИП 315081600010093, ИНН 081410033690</p>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="video-modal" modali-backdrop="true" tabindex="1" role="dialog" aria-labelledby="videoModal" style="text-align: center; margin: 3vw auto">
        <div class="display-inline width-eight-perc" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <img src="/ico/close.png" alt="">   
                    </span>
                </button>
                <div class="video-js-responsive-container vjs-hd" style="width:80%">
                    <video id="comment-video" class="video-js vjs-default-skin"
                                     controls preload="auto"
                                      data-setup='{"responsive": true,"example_option":true}'>
                        <source src="" type="video/ogg">
                    </video>
                </div>
            </div>
        </div>
    </div>

    @include('home.registration',['user' => $user, 'referral' => $referral])
    @include('politics.user_agreements')
    @include('politics.partners')
@overwrite
