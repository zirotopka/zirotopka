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
                    height: 600px;
                    width: 100%;
                    background-size: cover;
                    padding: 150px 50px;
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
                    height: 400px;
                    width: 100%;
                    background-size: cover;
                    padding: 100px 50px;
                    text-align: center;
                }
                .block-parthner-program .block-footer .title h1{
                    font-size: 2vw;
                    font-family: 'GilroyBold';
                    margin: 0;
                }

                .block-parthner-program .block-content{
                    padding: 0 50px;
                }
                .block-parthner-program .block-parthner-information{
                    padding: 100px 0;
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

                .block-parthner-program .block-parthner-information .block-how-it-works{

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
            </style>
            <div class="block-parthner-program">
                <div class="block-top">
                    <div class="title">
                        <h1>ПАРТНЕРСКАЯ ПРОГРАММА REFORMATOR.ONE</h1>
                        <span>
                                    Зарабатывай 1000 рублей с 1 продажи и создавай пассивный доход по системе CPA*
                                </span>
                    </div>
                    <button type="button" class="reg_btn" data-toggle="modal" data-target="#">СТАТЬ ПАРТНЕРОМ</button>
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
                            <div class="row item">
                                <div class="col-sm-4">
                                    <img src="/image/parthner-image-1.jpg">
                                </div>
                                <div class="col-sm-4">
                                    <div class="title">УНИКАЛЬНЫЙ ПРОДУКТ</div>
                                    <div class="text">
                                        Занятия спортом из любой точки мира , видеоинструкции, поддержка тренеров, рекомендации по питанию.
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -220px;">
                                <div class="col-sm-4 item">
                                    <img src="/image/parthner-image-2.png">
                                    <div class="title">БОЛЬШИЕ ВОЗНАГРАЖДЕНИЯ</div>
                                    <div class="text">
                                        Вы зарабатываете 1000 рублей с каждой оплаты, а так же предусмотрена система пассивного дохода.
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 50px;">
                                <div class="col-sm-4 item" style="margin-top: -50px;">
                                    <img src="/image/parthner-image-3.png">
                                    <div class="title">ПАССИВНЫЙ ДОХОД</div>
                                    <div class="text">
                                        *Если Ваш реферал приведет нового - Вы получите + 150 рублей, а если реферал Вашего реферала приведет участника + 100 рублей пассивного дохода.
                                    </div>
                                </div>
                                <div class="col-sm-4 item" style="margin-top: 25px;">
                                    <img src="/image/parthner-image-4.png">
                                    <div class="title">ВЫСОКАЯ КОНВЕРСИЯ <br>БЫСТРЫЕ ВЫПЛАТЫ</div>
                                    <div class="text">
                                        Мы не ставим минимальную сумму вывода, выплаты осуществляем в течении
                                        3 дней.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-footer">
                    <div class="title">
                        <h1>СОТНИ ПАРТНЕРОВ УЖЕ ЗАРАБАТЫВАЮТ С НАМИ</h1>
                    </div>
                    <button type="button" class="reg_btn" data-toggle="modal" data-target="#">ПРИСОЕДИНИТЬСЯ</button>
                </div>
            </div>
        </div>
    </div>
    @include('home.registration',['user' => $user, 'referral' => $referral])
    @include('home.login')
    @include('politics.user_agreements')
    @include('politics.partners')
@overwrite
