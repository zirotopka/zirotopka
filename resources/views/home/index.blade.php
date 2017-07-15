@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/css/main.css" type="text/css" rel="stylesheet">
    <link href="/assets/swiper/swiper.min.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/js/main.js"></script>
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>

@overwrite

@section("content")
	<div class="container-fluid">
		@include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>	
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="reg-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="reg_screen">
                <div  class="reg_screen_shader"></div>                
                <div class="reg_scr_content">
                    <div id="st-trigger-effects" class="hidden-md hidden-lg">
                        <button data-effect="st-effect-2" class="cdr-btn">
                            <img src="/ico/menu.png" alt="" style="width: 3vw;">
                        </button>
                    </div>
                    @if ($user = Sentinel::check())
                        <div class="checked">
                            @if (!empty($user->user_ava_url))
                                <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                            @else
                                <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                            @endif
                            <div class="dropdown main_dropdown">
                                <button class="dropdown-toggle" type="button" id="nav-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <div>
                                        <span class="user-name">{{$user->first_name}}</span>
                                    </div>
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </button>
                                <ul class="user_dropdown dropdown-menu dropdown-menu-right" aria-labelledby="nav-dropdown">
                                    <li><a href="/lk/{{$user->id}}">ПРОГРАММА</a></li>
                                    <li><a href="/lk/{{$user->id}}/edit">ПРОФИЛЬ</a></li>
                                    <li><a href="/logout">ВЫЙТИ</a></li>
                                </ul>
                            </div>
                        </div>
                    @else            
                        <div class="reg_log_btns">
                            <button type="button" class="rl_btns reg_btn" data-toggle="modal" data-target="#registr">РЕГИСТРАЦИЯ</button>
                            <button type="button" class="rl_btns log_btn" data-toggle="modal" data-target="#login">ВОЙТИ</button>
                        </div>
                    @endif
                    <div class="reg_scrn_txt">
                        <h1>ОНЛАЙН ПЛАТФОРМА</h1>
                        <h1>ДЛЯ ВЫГОДНЫХ ЗАНЯТИЙ СПОРТОМ</h1>
                        <p>В ЛЮБОЕ ВРЕМЯ ИЗ ЛЮБОЙ ТОЧКИ МИРА</p>
                    </div>
                    <button type="button" class="rg_btn" data-toggle="modal" data-target="#registr">ЗАРЕГИСТРИРОВАТЬСЯ</button>
                </div>    
            </div>
            <div class="info-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="info_naming col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>ЧТО ТАКОЕ</h2>
                    <img src="/ico/REFORMATOR.png" alt="">
                </div>
                <div class="info_cont col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12 n1">
                                <img src="/ico/agenda.svg" alt="">
                                <p>Планы тренировок для<br>любого уровня подготовки</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12 n2">
                                <img src="/ico/instr.svg" alt="">
                                <p>Наглядные видео-инструкции<br>для всех заданий</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12 n3">
                                <img src="/ico/rn.svg" alt="">
                                <p>Задания не требуют<br>специального оборудования<br>или похода в фитнес-клуб</p>
                            </li>
                        </ul>
                        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12 n4">
                                <img src="/ico/prize.svg" alt="">
                                <p>Рекомендации по питанию,<br>адаптированные к планам<br>тренировок</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12 n5">
                                <img src="/ico/people.svg" alt="">
                                <p>Обратная связь от <br>тренерского состава</p>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12 n6">
                                <img src="/ico/lamp.svg" alt="">
                                <p>Возможность зарабатывать<br>деньги и заниматься спортом<br>в удовольстваие!</p>
                            </li>
                        </ul>
                </div>
                <hr>
            </div>
            <div class="programm-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>ПРОГРАММЫ</h2>
                <div class="programm_list">
                    <div class="rone_start col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <img src="/ico/start.png" class="start" alt="">
                        <div class="start_shader">
                            <h4>R.ONE start</h4>
                            <p>Программа для новичков</p>
                            <button class="arrow" type="button"></button>
                        </div>
                    </div>
                    <div class="rone_other_progr col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="first_progr_string">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <img src="/ico/pro.png" class="prog_imgs prop" alt="">
                                    <div class="pro_shader">
                                        <h4>R.ONE pro</h4>
                                        <p>Программа для новичков</p>
                                        <button class="arrow" type="button"></button>
                                    </div>
                                </li>
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <img src="/ico/pow.png" class="prog_imgs powp" alt="">
                                    <div class="pow_shader">
                                        <h4>R.ONE power</h4>
                                        <p>Программа для новичков</p>
                                        <button class="arrow" type="button"></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="second_progr_string">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <img src="/ico/run.png" class="prog_imgs runp" style="width: 21vw; margin: 0.1em 0 0 -0.65em;" alt="">
                                    <div class="run_shader">
                                        <h4>R.ONE run</h4>
                                        <p>Программа для новичков</p>
                                        <button class="arrow" type="button"></button>
                                    </div>
                                </li>
                                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <img src="/ico/run+.png" class="prog_imgs runpl" alt="">
                                    <div class="runp_shader">
                                        <h4>R.ONE run+</h4>
                                        <p>Программа для новичков</p>
                                        <button class="arrow" type="button"></button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="bonus-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>БОНУСЫ</h2>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 left_bonus_part">
                    <img src="/ico/money.svg" alt="">    
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 right_bonus_part">
                    <p>ЗАНИМАЙТЕСЬ СПОРТОМ, ЗАРАБАТЫВАЙТЕ ДЕНЬГИ<br>С ПОМОЩЬЮ ПРОСТОЙ И УДОБНОЙ<br>БОНУСНОЙ СИСТЕМЫ ВОЗНАГРАЖДЕНИЯ УЧАСТНИКОВ</p>
                    <button type="button" class="bonus_btn">ПОДРОБНЕЕ</button>
                </div>
                <hr>
            </div>
            <div class="how-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>КАК ЭТО РАБОТАЕТ</h2>
                <div style="height: 43vw; max-height: 504px;" class="asd">
                    <div class="col-lg-4 col-md-4 col-sm-4 how_cnt choice">
                        <img src="/ico/chs.svg" alt="">
                        <p class="orng">Вы выбираете сами</p>
                        <p class="who_txt">Подходящий пан тренировок<br>в зависимости от подготовки.<br>Удобная дата начала тренировок.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 how_cnt freedom">
                        <img src="/ico/frdm.svg" alt="">
                        <p class="orng">Свобода действий</p>
                        <p class="who_txt">Самостоятельное планирование<br>времени и места для выполнения<br>заданий. Объединение и мотивация<br>друзей и близких.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 how_cnt profit">
                        <img src="/ico/prft.svg" alt="">
                        <p class="orng">Возможность зарабатывать</p>
                        <p class="who_txt">Вознаграждения через бонусную<br>систему платформы. Поощрение<br>и подарки для самых активных.</p>
                    </div>
                </div>
                <button>ПОПРОБОВАТЬ БЕСПЛАТНО</button>
                <hr>
            </div>
            <div class="comments-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>ОТЗЫВЫ</h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <video src="/video/trainings/birpie.mp4" class="video-js" controls></video>
                            <p class="comment_name">Пётр Пётр</p>
                            <p class="comment_who">Участник R'ONE pro</p>
                        </div>
                        <div class="swiper-slide">
                            <video></video>
                            <p class="comment_name">Илья Петров</p>
                            <p class="comment_who">Участник R'ONE power</p>
                        </div>
                        <div class="swiper-slide">
                            <video></video>
                            <p class="comment_name">Ирина Пархоменко</p>
                            <p class="comment_who">Участник R'ONE start</p>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <p class="watch_more">Смотреть больше отзывов</p>
                <button class="arrow" type="button"></button>
                <hr>
            </div>
            <div class="questions-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2>ВОПРОСЫ И ОТВЕТЫ</h2>
                <div class="col-lg-6 col-md-6 col-sm-6 left_quest">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ref">
                        <div>
                            <img src="/ico/lightning.png" alt="">
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
                            <img src="/ico/gantel.png" alt="">
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
                <div class="col-lg-6 col-md-6 col-sm-6 right_quest">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ruls">
                        <div>
                            <img src="/ico/prize1.png" alt="">
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
                            <img src="/ico/str.png" alt="">
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
            <div class="connect-screen col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div  class="connect_screen_shader"></div>
                <div class="connect_content">
                    <p class="connect">ПРИСОЕДИНИТЬСЯ!</p>
                    <p class="connect_info">ПОУЧИТЬ ДОСТУП К ПЛАТФОРМЕ REFORMATOR.ONE <br>В ТЕЧЕНИЕ ТЕСТОВОГО ПЕРИОДА СОВЕРШЕННО БЕСПЛАТНО</p>
                    <p class="connect_price">2500 руб. <b>0 руб.</b></p>
                    <button class="connect_btn" type="button">ПРОБОВАТЬ БЕСПЛАТНО</button>
                </div>                
            </div>
            <footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mission">
                    <img src="/ico/footer_logo.png" alt="">
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
                        <li class="bonus"><a href="#" >БОНУСНАЯ<br>
                         ПРОГРАММА</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 reg_f_s">
                    <ul>
                        <li>
                            <a href="">РЕГИСТРАЦИЯ</a>
                        </li>
                        <li>
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
                        <li>
                            <a href="#">ПОЛИТИКА<br>КОНФЕДИЦИАЛЬНОСТИ</a>
                        </li>
                    </ul>
                </div>
            </footer>
        </div>
	</div>
	@include('home.registration')
	@include('home.login')
@overwrite
