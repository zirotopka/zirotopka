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
    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-187501-9TeUl';</script>
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="/assets/home/bonus-scrollspy.js"></script>
    <script type="text/javascript" src="/assets/home/bonus.js?{{time()}}"></script>
@overwrite

@section("content")
    <div class="container-fluid" >
        @include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <style>
                .block-parthner-program{

                }
                .block-parthner-program .block-top{
                    background: url("/image/bg-parthner-program.jpg") no-repeat;
                    height: 40vw;
                    width: 100%;
                    background-size: cover;
                    padding: 11.41vw 5vw;
                }
                .block-parthner-program .block-top .title,
                .block-parthner-program .block-footer .title{
                    color: white;
                }
                .block-parthner-program .block-top .title h1{
                    font-size: 2.9vw;
                    font-family: 'GilroyBold';
                    margin: 0;
                }
                .block-parthner-program .block-top .title span{
                    font-size: 1.5vw;
                    font-family: 'MuseoSansCyrl_100';
                    font-weight: 100;
                    margin-top: 15px;
                    display: block;
                    width: 33vw;
                }

                .block-parthner-program .block-footer{
                    background: url("/image/bg-parthner-program-footer.jpg") no-repeat;
                    height: 30vw;
                    width: 100%;
                    background-size: cover;
                    padding: 9.93vw 5vw;
                    text-align: center;
                }
                .block-parthner-program .block-footer .title h1{
                    font-size: 2vw;
                    font-family: 'GilroyBold';
                    margin: 0;
                }

                .block-parthner-program .block-content{
                    padding: 0 5vw;
                }
                .block-parthner-program .block-parthner-information{
                    padding: 7.5vw 0;
                }
                .block-parthner-program .block-parthner-information .title{
                    margin-bottom: 30px;
                }
                .block-parthner-program .block-parthner-information .title h1{
                    font-size: 2.9vw;
                    font-family: 'GilroyBold';
                    margin: 0;
                    color: #ff8a18;
                }
                .block-parthner-program .block-parthner-information .content{
                    position: relative;
                    max-height: 900px;
                }
                .block-parthner-program .block-parthner-information .content .title{
                    font-family: 'GilroyBold';
                    color: black;
                    font-size: 18px;
                    font-weight: 100;
                    margin: 20px 0 10px;
                }
                .block-parthner-program .block-parthner-information .content .text{
                    font-size: 16px;
                    font-weight: 100;
                    font-family: 'MuseoSansCyrl_100';
                }
                .block-parthner-program .block-parthner-information .content img{
                    width: 100%;
                }
                .block-parthner-program .block-parthner-information .item{
                    overflow: hidden;
                }
                .block-parthner-program .block-parthner-information .item .col-1{
                    float: left;
                    max-width: 295px;
                }
                .block-parthner-program .block-parthner-information .item .col-2{
                    float: left;
                    max-width: 310px;
                    margin-left: 30px;
                }
                .block-parthner-program .block-parthner-information .item.upper-image{
                    max-width: 300px;
                }
                .block-parthner-program .block-parthner-information .item.upper-image img{
                    width: auto;
                }
                .block-parthner-program .block-parthner-information .content .block-upper-image-1{
                    position: relative;
                    top: -220px;
                    left: 330px;
                }
                .block-parthner-program .block-parthner-information .content .block-upper-image-2{
                    position: relative;
                    top: -250px;
                }
                .block-parthner-program .block-parthner-information .content .block-upper-image-3{
                    position: absolute;
                    left: 330px;
                    top: 600px;
                }



                .block-parthner-program .block-parthner-information .block-how-it-works{

                }
                .block-parthner-program .block-parthner-information .block-how-it-works .item{
                    overflow: visible;
                }
                .block-parthner-program .block-parthner-information .block-how-it-works span{
                    color: #ff8a18;
                    font-family: 'GilroyBold';
                    font-size: 8.5vw;
                    display: inline-block;
                    vertical-align: middle;
                    line-height: 1!important;
                }
                .block-parthner-program .block-parthner-information .block-how-it-works .row div{
                    display: inline-block;
                    vertical-align: middle;
                    font-family: 'MuseoSansCyrl_100';
                    font-size: 16px;
                    font-weight: 100;
                    max-width: 60%;
                    padding-left: 10px;
                }
                .block-parthner-program .block-parthner-information .block-how-it-works .item{
                    position: relative;
                }
                .block-parthner-program .block-parthner-information .block-how-it-works .item:before{
                    content: ' ';
                    display: block;
                    position: absolute;
                }
                .block-parthner-program .block-parthner-information .block-how-it-works .item:nth-child(1):before{
                    background: url("/image/parthner-icon-1.png") no-repeat;
                    width: 210px;
                    height: 58px;
                    top: 120px;
                    left: 150px;
                }
                .block-parthner-program .block-parthner-information .block-how-it-works .item:nth-child(2):before{
                    background: url("/image/parthner-icon-2.png") no-repeat;
                    width: 210px;
                    height: 58px;
                    top: 120px;
                    left: 29.5vw;
                }

                .parthner_btn,
                .parthner_btn:hover{
                    margin-top: 4%;
                }

                @media only screen and (max-width : 768px){
                    .block-parthner-program .block-parthner-information .content .item.upper-image{
                        position: static!important;
                        margin-top: 50px;
                    }
                    .block-parthner-program .block-parthner-information .content{
                        max-height: 100%!important;
                    }
                    .block-parthner-program .block-parthner-information .block-how-it-works .item{
                        overflow: visible;
                    }
                    .block-parthner-program .block-parthner-information .block-how-it-works .item:not(:last-child){
                        margin-bottom: 30px;
                    }
                    .block-parthner-program .block-parthner-information .block-how-it-works .item:nth-child(1):before,
                    .block-parthner-program .block-parthner-information .block-how-it-works .item:nth-child(2):before{
                        background: none!important;
                    }
                }

                @media only screen and (min-device-width : 320px) and (max-device-width : 736px){
                    .block-parthner-program .block-top{
                        height: 60vw;
                    }
                    .block-parthner-program .block-top .title h1,
                    .block-parthner-program .block-footer .title h1{
                        font-size: 5vw;
                    }
                    .block-parthner-program .block-parthner-information .title h1{
                        font-size: 5vw;
                    }
                    .block-parthner-program .block-top .title span{
                        font-size: 3vw;
                        width: 100%;
                    }
                    .block-parthner-program .block-parthner-information .block-how-it-works .row div{
                        max-width: 100%;
                    }
                    .block-parthner-program .block-parthner-information .block-how-it-works .row .col-sm-5 div{
                        width: 70%;
                    }
                    .block-parthner-program .block-footer{
                        height: 50vw;
                    }
                }
            </style>
            <div class="block-parthner-program">
                <div class="block-top">
                    <div class="title">
                        <h1>ПАРТНЕРСКАЯ ПРОГРАММА REFORMATOR.ONE</h1>
                        <span>Зарабатывай 1000 рублей с 1 продажи и создавай пассивный доход по системе CPA*</span>
                    </div>
                    <button type="button" class="parthner_btn" data-toggle="modal">СТАТЬ ПАРТНЕРОМ</button>
                    <button type="button" class="parthner_btn" data-toggle="modal" data-target="#login">ВХОД</button>
                </div>
                <div class="block-content">
                    <div class="block-parthner-information" style="padding-bottom: 0;">
                        <div class="title">
                            <h1>КАК РАБОТАЕТ НАША ПАРТНЕРСКАЯ ПРОГРАММА?</h1>
                        </div>
                        <div class="content">
                            <div class="block-how-it-works">
                                <div class="row item">
                                    <div class="col-sm-5">
                                        <span>1</span>
                                        <div>
                                            Вы регистрируетесь и получаете партнерскую ссылку
                                        </div>
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-sm-5 col-sm-offset-5">
                                        <span>2</span>
                                        <div>
                                            С каждой оплаты программы Вы получите 1000 рублей стоимость программ от 1500 до 2500 рублей)
                                        </div>
                                    </div>
                                </div>
                                <div class="row item">
                                    <div class="col-sm-5">
                                        <span>3</span>
                                        <div>
                                            Все оплаты Вы будете видеть в личном кабинете, в режиме онлайн.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-parthner-information">
                        <div class="title">
                            <h1>ПРЕИМУЩЕСТВА РАБОТЫ С НАМИ</h1>
                        </div>
                        <div class="content">
                            <div class="item">
                                <div class="col-1">
                                    <img src="/image/parthner-image-1.jpg">
                                </div>
                                <div class="col-2">
                                    <div class="title">УНИКАЛЬНЫЙ ПРОДУКТ</div>
                                    <div class="text">
                                        Занятия спортом из любой точки мира , видеоинструкции, поддержка тренеров, рекомендации по питанию.
                                    </div>
                                </div>
                            </div>
                            <div class="item upper-image block-upper-image-1">
                                <img src="/image/parthner-image-2.png">
                                <div class="title">БОЛЬШИЕ ВОЗНАГРАЖДЕНИЯ</div>
                                <div class="text">
                                    Вы зарабатываете 1000 рублей с каждой оплаты, а так же предусмотрена система пассивного дохода.
                                </div>
                            </div>
                            <div class="item upper-image block-upper-image-2">
                                <img src="/image/parthner-image-3.png">
                                <div class="title">ПАССИВНЫЙ ДОХОД</div>
                                <div class="text">
                                    *Если Ваш реферал приведет нового - Вы получите + 150 рублей, а если реферал Вашего реферала приведет участника + 100 рублей пассивного дохода.
                                </div>
                            </div>
                            <div class="item upper-image block-upper-image-3">
                                <img src="/image/parthner-image-4.png">
                                <div class="title">ВЫСОКАЯ КОНВЕРСИЯ <br>БЫСТРЫЕ ВЫПЛАТЫ</div>
                                <div class="text">
                                    Мы не ставим минимальную сумму вывода, выплаты осуществляем в течении 3 дней.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-footer">
                    <div class="title">
                        <h1>СОТНИ ПАРТНЕРОВ УЖЕ ЗАРАБАТЫВАЮТ С НАМИ</h1>
                    </div>
                    <button type="button" class="parthner_btn" data-toggle="modal">ПРИСОЕДИНИТЬСЯ</button>
                </div>
            </div>
            <footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mission">
                    <img src="/ico/min-logo.svg" alt="">
                    <p>
                        Наша миссия в повышении качества жизни общества через вовлечение широкого круга населения в любительский спорт и зож
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 prgrm_list">
                    <ul>
                        <li class="title">Программы</li>
                        <li><a href="/programm/r.one_lite">R.ONE LITE</a></li>
                        <li><a href="/programm/r.one_start">R.ONE START</a></li>
                        <li><a href="/programm/r.one_pro">R.ONE PRO</a></li>
                        <li><a href="/programm/r.one_runner">R.ONE RUNNER</a></li>
                        <li><a href="/programm/r.one_power">R.ONE POWER</a></li>
                        <li class="bonus"><a href="/bonus" >БОНУСНАЯ <br>ПРОГРАММА</a></li>
                        <li class="bonus"><a href="/affiliate/desktop">ПАРТНЁРСКАЯ ПРОГРАММА</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ofrta">
                    <ul>
                        <li class="title">Соглашение</li>
                        <li class="prtnrs">
                            <a href="#" data-toggle="modal" data-target="#partners">Партнёрское соглашение</a>
                        </li>
                        <li id="pltks">
                            <a href="#" data-toggle="modal" data-target="#user_agreements">Пользовательское соглашение</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 reg_f_s">
                    <ul class="rgese">
                        <li class="title">Подпишись</li>
                        <li class="block-social-links">
                            <a href="https://facebook.com/reformator.one/">
                                <img src="/image/social-networks/icon-facebook.png" alt="">
                            </a>
                            <a href="https://vk.com/reformatorone">
                                <img src="/image/social-networks/icon-vk.png" alt="">
                            </a>
                            <a href="https://instagram.com/reformator.one">
                                <img src="/image/social-networks/icon-instagram.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12">
                    <div class="block-payment-systems">
                        <a href="javascript:void(0);">
                            <img src="/image/payment-systems/icon-visa.png" title="Visa" alt="Visa">
                        </a>
                        <a href="javascript:void(0);">
                            <img src="/image/payment-systems/icon-mastercard.png" title="MasterCard" alt="MasterCard">
                        </a>
                        <a href="https://info.paymaster.ru" target="_blank">
                            <img src="/image/payment-systems/icon-paymaster.png" title="Paymaster" alt="Paymaster">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p style="color:#737272" class="ip">ИП Санджиева Фаина Санджаевна, ОГРНИП 315081600010093, ИНН 081410033690</p>
                </div>
            </footer>
        </div>
    </div>
    @include('home.registration',['user' => $user, 'referral' => $referral])
    @include('home.login',['title' => 'ВХОД ДЛЯ ПАРТНЕРОВ'])
    @include('politics.user_agreements')
    @include('politics.partners')
@overwrite
