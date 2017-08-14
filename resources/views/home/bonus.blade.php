@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/home/reg-log_form.css" type="text/css" rel="stylesheet">
    <link href="/assets/home/bonus.css" type="text/css" rel="stylesheet">
@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="/assets/home/bonus-scrollspy.js"></script>
    <script type="text/javascript" src="/assets/home/bonus.js"></script>
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
        @else
            <div id="st-trigger-effects" class="hidden-md hidden-lg">
                <button data-effect="st-effect-2" class="cdr-btn">
                    <img src="/ico/menu.svg" alt="" style="width: 5vw;">
                </button>
            </div>
        @endif
            <div class="bonus-content">
                <div class="bons-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>ЗАРАБАТЫВАЙТЕ ВМЕСТЕ<br>С НАШЕЙ БОНУСНОЙ ПРОГРАММОЙ</h1>
                    <p>Вы начинаете заниматься спортом<br>по любой программе на платформе,<br>приглашаете друзей и сразу зарабатываете</p>
                    <button type="button" class="reg_btn" data-toggle="modal" data-target="#registr">
                        РЕГИСТРАЦИЯ
                    </button>
                    <button type="button" class="abo_btn">
                        ПОДРОБНЕЕ
                    </button>
                    <img src="/ico/pig.svg" class="pig hidden-xs">
                </div>
                    <hr>
                <div class="bons-how-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_2">
                    <h2>КАК ЭТО РАБОТАЕТ</h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p class="how-content col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            Участником бонусной программы могут быть только<br>действующие участники любой из программ R.ONE. <br> Вы приглашаете своих партнёров в проект, давая<br>скидку на доступ и получить 500р с каждой <br> оплаты.
                        </p>
                        <p class="how-content col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            Начиная со 2 линии Вы получаете пассивный доход<br>от партнёров Вашей команды. Так же Ваши участники<br>следующей за вами линии тоже начинают получать<br>доход от тех людей, которых пригласили в проект Вы<br>или участники вашей линии.
                        </p>
                    </div>
                    <embed class="mobimg visible-xs" src="/ico/mbonus.svg">
                        

    
                    <div class="hidden-xs how-images col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                            <li>
                                <h2>
                                    ВЫ
                                </h2>
                                <img src="/ico/king.svg" class="king">
                            </li>
                            <li class="arrw">
                                <p>скидка 10%</p>
                                <img src="/ico/black-arrow.svg" class="black-arrow">
                            </li>
                            <li class="holp">
                                <p>Участник №1</p>
                                <img src="/ico/holop.svg" class="holop">
                            </li>
                            <li class="arrw">
                                <p>скидка 10%</p>
                                <img src="/ico/black-arrow.svg" class="black-arrow">
                            </li>
                            <li class="holp">
                                <p>Участник №2</p>
                                <img src="/ico/holop.svg" class="holop"> 
                           </li>
                            <li class="arrw">
                                <p>скидка 10%</p>
                                <img src="/ico/black-arrow.svg" class="black-arrow">
                            </li>
                            <li class="holp">
                                <p>Участник №3</p>
                                <img src="/ico/holop.svg" class="holop">
                            </li>
                        </ul>
                    </div>
                    <embed class="carrows hidden-xs" src="/ico/bonuss.svg">
            
                </div>
                <hr>
                <div class="bons-about-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_3">
                    <h2>О НАС</h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about-icon-content">
                        <div class="ab-ct col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <img src="/ico/sertificats.svg" class="about-icons">
                            <p>Мы строго соблюдаем<br>законодательство и требуем<br>этого от всех наших партнёров<br>и участников проекта.</p>
                        </div>
                        <div class="ab-ct col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <img src="/ico/garanty.svg" class="about-icons">
                            <p>
                                Мы используем <br class="visible-sm">SSL-сертификат<br class="visible-md"> для <br class="hidden-lg hidden-md">безопасности передачи<br> персональных данных<br>и защиты всех платежей
                            </p>
                        </div>
                        <div class="ab-ct col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <img src="/ico/payments.svg" class="about-icons">
                            <p>Мы принимаем платежи<br>и осуществляем выплаты только<br>через проверенных партнёров,<br>таких как Яндекс.</p>
                        </div>
                    </div>                    
                </div>
                <hr>
                <div class="bons-pay-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_4">
                    <h2>О ПЛАТЕЖНОМ <br class="visible-xs">СЕРВИСЕ ЯНДЕКС</h2>
                    <div class="pay_right visible-xs col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="mfc">
                            <img src="/ico/smartphone.png" class="smartphone">
                        </div>
                    </div>
                    <div class="pay_left col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <p>
                            Мы готовы доверять денежные вопросы только<br class="hidden-xs">надёжным партнёрам, при этом хотим<br class="hidden-xs">чтобы все выплаты были доступны для участников<br class="hidden-xs">как можно быстрее. <br class="hidden-xs">Поэтому используем удобные сервисы Яндекс.
                        </p>
                    </div>
                    <div class="pay_right hidden-xs col-sm-6 col-md-6 col-lg-6">
                        <div class="mfc">
                            <img src="/ico/smartphone.png" class="smartphone">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="bons-question-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_5">
                    <h2>ВОПРОСЫ И ОТВЕТЫ</h2>
                    <div class="quest_left col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <ul>
                            <li style="line-height: 2.6vw;" class="two_lines">Lorem ispum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ispum dolor sit amet</li>
                            <li>Lorem ispum dolor sit amet</li>
                            <li>Lorem ispum dolor sit amet</li>
                            <li>Lorem ispum dolor sit amet</li>
                        </ul>
                    </div>
                    <div class="quest_right col-xs-12 col-sm-7 col-md-7 col-lg-7">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus iaculis tellus, id feugiat purus pharetra vitae. Nulla facilisi. Sed at condimentum augue, at interdum leo. Maecenas eu interdum ipsum, id aliquam nibh. Nam molestie velit et turpis rutrum, quis rutrum leo accumsan. Vivamus nec laoreet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec justo rutrum, vehicula magna in, tempus metus.</p>
                    </div>
                    <p class="qwston">?</p>
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
                </footer>
            </div>
        </div>
    </div>
    @include('home.registration',['user' => $user, 'referral' => $referral])
    @include('home.login')
@overwrite
