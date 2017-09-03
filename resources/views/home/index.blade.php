@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/home/reg-log_form.css" type="text/css" rel="stylesheet">
    <link href="http://vjs.zencdn.net/5.4.6/video-js.css" rel="stylesheet">
    <link href="/assets/css/main.css" type="text/css" rel="stylesheet">
    <link href="/assets/swiper/swiper.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/video-btn.css">



@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script src="/assets/home/index-scrollspy.js"></script>
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>
    <script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
    <script src="/assets/home/home.js"></script>

@overwrite

@section("content")
	<div class="container-fluid">
		@include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>	
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
          @if ($user = Sentinel::check())
          @php
              $class = '';
              $class = 'rg_check_in';
          @endphp
            <div class="{{$class}} reg-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="reg_screen">
                <div  class="reg_screen_shader"></div>                
                <div class="reg_scr_content">
                    <div class="reg_scrn_txt">
                            {{json_encode($errors)}}
                        <h1>ОНЛАЙН ПЛАТФОРМА</h1>
                        <h1>ДЛЯ ВЫГОДНЫХ ЗАНЯТИЙ СПОРТОМ</h1>
                        <p>В ЛЮБОЕ ВРЕМЯ ИЗ ЛЮБОЙ ТОЧКИ МИРА</p>
                    </div>
                    <button type="button" class="rg_btn">ПОДРОБНЕЕ</button>
                </div>    
            </div>
          @else
            <div class="reg-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="reg_screen">
                <div  class="reg_screen_shader"></div>                
                <div class="reg_scr_content">
                    <div id="st-trigger-effects" class="hidden-md hidden-lg">
                        <button data-effect="st-effect-2" class="cdr-btn">
                            <img src="/ico/menu1.svg" alt="" style="width: 5vw;margin: 2.85vw 0 0 2.85vw;">
                        </button>
                    </div>
                        <div class="reg_log_btns">
                            <button type="button" class="rl_btns reg_btn" data-toggle="modal" data-target="#registr">РЕГИСТРАЦИЯ</button>
                            <button type="button" class="rl_btns log_btn" data-toggle="modal" data-target="#login">ВОЙТИ</button>
                        </div>
                    <div class="reg_scrn_txt">
                        <h1>ОНЛАЙН ПЛАТФОРМА</h1>
                        <h1>ДЛЯ ВЫГОДНЫХ ЗАНЯТИЙ СПОРТОМ</h1>
                        <p>В ЛЮБОЕ ВРЕМЯ ИЗ ЛЮБОЙ ТОЧКИ МИРА</p>
                    </div>
                    <button type="button" class="rg_btn">ПОДРОБНЕЕ</button>
                </div>    
            </div>
          @endif
            <div class="info-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_2">
                <div class="info_naming col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>ЧТО ТАКОЕ</h2>
                    <img src="/ico/REFORMATOR.svg" alt="">
                </div>
                <div class="info_cont col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4 n1">
                                <img src="/ico/agenda.svg" alt="">
                                <p>Планы тренировок для<br>любого уровня подготовки</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4 n2">
                                <img src="/ico/instr.svg" alt="">
                                <p>Наглядные видео-инструкции<br>для всех заданий</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4 n3">
                                <img src="/ico/people.svg" alt="">
                                <p>Обратная связь от <br>тренерского состава</p>
                            </li>
     
                        </ul>
                        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4 n4">
                                <img src="/ico/feed.svg" alt="">
                                <p>Рекомендации по питанию,<br>адаптированные к планам<br>тренировок</p>
                            </li>
                       <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4 n5">
                                <img src="/ico/rn.svg" alt="">
                                <p>Задания не требуют<br>специального оборудования<br>или похода в фитнес-клуб</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-4 n6">
                                <img src="/ico/lamp.svg" alt="">
                                <p>Возможность зарабатывать<br>деньги и заниматься спортом<br>в удовольстваие!</p>
                            </li>
                        </ul>
                </div>
            </div>
            <hr class="disp_line">
            <div class="programm-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_3">
                <h2>ПРОГРАММЫ</h2>
                <div class="programm_list">
                    <div class="rone_start col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <img src="/ico/start.jpg" class="start" alt="">
                        <p class="prg1">R.ONE start</p>
                        <div class="start_shader_gray"><p>ST</p></div>
                        <div class="start_shader">
                            <h4>R.ONE start</h4>
                            <p>Программа для новичков</p>
                            <a href="/program" class="arrow start-arrow" ></a>
                        </div>
                    </div>
                    <div class="rone_other_progr col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="first_progr_string">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <img src="/ico/pro.jpg" class="prog_imgs prop" alt="">
                                    <p class="prprp prg2">R.ONE pro</p>
                                    <div class="pro_shader_gray"><p>PR</p></div>
                                    <div class="pro_shader">
                                        <h4>R.ONE pro</h4>
                                        <p>Программа для новичков</p>
                                        <a class="arrow progr-arrow" href="/program"></a>
                                    </div>
                                </li>
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <img src="/ico/power.jpg" class="prog_imgs powp" alt="">
                                    <p class="prprp prg3">R.ONE power</p>
                                    <div class="pow_shader_gray"><p>PO</p></div>
                                    <div class="pow_shader">
                                        <h4>R.ONE power</h4>
                                        <p>Программа для новичков</p>
                                        <a class="arrow progr-arrow" href="/program"></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="second_progr_string">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <img src="/ico/run.jpg" class="prog_imgs runp" alt="">
                                    <p class="prprp prg4">R.ONE run</p>
                                    <div class="run_shader_gray"><p>RU</p></div>
                                    <div class="run_shader">
                                        <h4>R.ONE run</h4>
                                        <p>Программа для новичков</p>
                                        <a class="arrow progr-arrow" href="/program"></a>
                                    </div>
                                </li>
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <img src="/ico/run+.jpg" class="prog_imgs runpl" alt="">
                                    <p class="prprp prg5">R.ONE run+</p>
                                    <div class="runp_shader_gray"><p>RU+</p></div>                    
                                    <div class="runp_shader">
                                        <h4>R.ONE run+</h4>
                                        <p>Программа для новичков</p>
                                        <a class="arrow progr-arrow" href="/program"></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="disp_line">
            <div class="bonus-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_4">
                <h2>БОНУСЫ</h2>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 left_bonus_part">
                    <img src="/ico/money.svg" alt="">    
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 right_bonus_part">
                    <p>ЗАНИМАЙТЕСЬ СПОРТОМ,<br class="visible-xs"> ЗАРАБАТЫВАЙТЕ ДЕНЬГИ<br>С ПОМОЩЬЮ ПРОСТОЙ И УДОБНОЙ<br>БОНУСНОЙ СИСТЕМЫ<br class="visible-xs"> ВОЗНАГРАЖДЕНИЯ УЧАСТНИКОВ</p>
                    <button type="button" class="bonus_btn" onclick="location.href='/bonus';">ПОДРОБНЕЕ</button>
                </div>
            </div>
            <hr class="disp_line">
            <div class="how-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_5">
                <h2>КАК ЭТО РАБОТАЕТ</h2>
                <div style="height: 43vw; max-height: 470px;" class="asd">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 how_cnt choice">
                        <img src="/ico/chs.svg" alt="">
                        <p class="orng">Вы выбираете сами</p>
                        <p class="who_txt">Подходящий план тренировок<br>в зависимости от подготовки.<br>Удобная дата начала тренировок.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 how_cnt freedom">
                        <img src="/ico/frdm.svg" alt="">
                        <p class="orng frdsd">Свобода действий</p>
                        <p class="who_txt">Самостоятельное планирование<br>времени и места для выполнения<br>заданий. Объединение<br class="visible-xs"> и мотивация<br>друзей и близких.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 how_cnt profit">
                        <img src="/ico/prft.svg" alt="">
                        <p class="orng ewwq">Возможность зарабатывать</p>
                        <p class="who_txt">Вознаграждения через бонусную<br>систему платформы. Поощрение<br>и подарки для самых активных.</p>
                    </div>
                </div>
                <button type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button>
            </div>
            <hr class="disp_line">
            <div class="comments-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_6">
                <h2>ОТЗЫВЫ</h2>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @forelse($comments as $comment)
                                <div class="swiper-slide" >
                                    <img src="{{$comment->img_holder}}" alt="" class="comm_img_hldr video_holder" >
                                    <img src="/ico/play.svg" alt="" class="ico_play" class="comm_pl_hldr" data-id="{{$comment->id}}">
                                    <p class="comment_name">{{$comment->user}}</p>
                                    <p class="comment_who">{{$comment->comment_text}}</p>
                                </div>
                            @empty
                            @endforelse
                         </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
            
                <p class="watch_more">Смотреть больше отзывов</p>
                <a class="arrow2" type="button"></a>
            </div>
            <hr class="disp_line">
            <div class="questions-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_7">
                <h2>ВОПРОСЫ И ОТВЕТЫ</h2>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left_quest">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ref">
                        <div>
                            <img src="/ico/lightning.svg" alt="">
                            <p class="zag">ВОПРОСЫ<br>О REFORMATOR.ONE</p>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <a href="#">Почему Reformator.One?</a>
                                    </li>
                                <li>
                                    <a href="">Это только про бег?</a>
                                </li>
                                <li>
                                    <a href="">Это только про бег?</a>
                                </li>
                                <li class="else">
                                    <a href="" class="else">Посмотреть ещё</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 prg">
                        <div>
                            <img src="/ico/prgrms.svg" class="zg_prgr">
                            <p class="zag">ВОПРОСЫ О ПРОГРАММЕ<br>И ЗАДАНИЯХ</p>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <a href="">Почему Reformator.One?</a>
                                </li>
                                <li>
                                    <a href="">Это только про бег?</a>
                                </li>
                                <li>
                                    <a href="">Чем реформатор отличается<br> от других проектов?</a>
                                </li>
                                <li class="else">
                                    <a href="" class="else">Посмотреть ещё</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 right_quest">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ruls">
                        <div>
                            <img src="/ico/prize1.svg" alt="">
                            <p class="zag">ПРАВИЛА УЧАСТИЯ<br>В ПРОГРАММЕ</p>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <a href="">Почему Reformator.One?</a>
                                </li>
                                <li>
                                    <a href="">Это только про бег?</a>
                                </li>
                                <li>
                                    <a href="">Это только про бег?</a>
                                </li>
                                <li class="else">
                                    <a href="" class="else">Посмотреть ещё</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 all">
                        <div>
                            <img src="/ico/str.svg" alt="">
                            <p class="zag">РАЗНОЕ<br>ОБЩИЕ ВОПРОСЫ</p>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <a href="">Почему Reformator.One?</a>
                                </li>
                                <li>
                                    <a href="">Это только про бег?</a>
                                </li>
                                <li>
                                    <a href="">Чем реформатор отличается<br> от других проектов?</a>
                                </li>
                                <li class="else">
                                    <a href="" class="else">Посмотреть ещё</a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                            <a href="">РЕГИСТРАЦИЯ</a>
                        </li>
                        <li class="accsss">
                            <a href="">ПОЛУЧИТЬ ДОСТУП<br>К БЕСПЛАТНОМУ КУРСУ</a>
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
                        <li>
                            <a href="#">ДОГОВОР ОФЕРТА</a>
                        </li>
                        <li id="pltks">
                            <a href="#">ПОЛИТИКА<br>КОНФЕДИЦИАЛЬНОСТИ</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-12">
                    <p style="color:white">ИП Санджиева Фаина Санджаевна, ОГРНИП 315081600010093, ИНН 081410033690</p>
                </div>
            </footer>
        </div>
	</div>

    <div class="modal fade" id="video-modal" modali-backdrop="true" tabindex="1" role="dialog" aria-labelledby="videoModal">
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
	@include('home.login')
@overwrite
