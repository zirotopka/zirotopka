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
            <div class="rstart-screen">
                <div class="rstart-logo">
                    <img src="" alt="">
                    <p>START</p>
                </div>
                <div class="rstart-txt-cnt col-sm-7 col-md-7 col-lg-7">
                    <div class="for_whm">
                        <p>ДЛЯ КОГО</p>
                        <img src="" alt="">
                    </div>
                    <p></p>
                    <button type="button">ПРОБОВАТЬ БЕСПЛАТНО</button>
                </div>
                <div class="rstart-img-cnt col-sm-5 col-md-5 col-lg-5">
                    <img src="" alt="">
                    <p>начальный уровень</p>
                    <br>
                    <img src="" alt="">
                    <p>для женщин и мужчик</p>
                    <img src="" alt="">
                    <p>для похудения<br>и поддержания формы</p>
                </div>
            </div>
            <div class="tcount-screen">
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>ДНЕЙ</p>
                </div>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>ТРЕНИРОВОК</p>
                </div>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>ВЫХОДНЫХ</p>
                </div>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>ЗАДАНИЙ</p>
                </div>
            </div>
            <div class="info-screen">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="video-holder">
                            
                        </div>
                        <div>
                            <p>БЕГ</p>
                            <p>Здесь будет более детальное описание<br>конкретных групп заданий, на какие<br>группы мышц и т.д.Здесь будет более<br> детальное описаниеконкретных групп<br> заданий, на какие группы мышц и т.д.</p>
                            <button type="button">ПРОБОВАТЬ БЕСПЛАТНО</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ruls-screen">
                <h2>ПРАВИЛА</h2>
                <p>Выплнение заданийподтверждается только с помощью отчёта в форме видео<br>или принтскрина экрана. Поэтому для того чтобы принять участие в проекте<br> Вам понадобится:</p>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>Пк, телефон<br>или планшет</p>
                </div>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>Интернет</p>
                </div>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>Пара кроссовок</p>
                </div>
                <div class=" col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <img src="" alt="">
                    <p>Хорошее<br>настроение</p>
                </div>
            </div>
        </div>
    </div>
    @include('home.registration',['user' => $user, 'referral' => $referral])
@overwrite
