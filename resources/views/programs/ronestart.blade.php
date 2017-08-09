@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/home/reg-log_form.css" type="text/css" rel="stylesheet">
    <link href="/assets/programs/programs.css" type="text/css" rel="stylesheet">
    <link href="/assets/swiper/swiper.min.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="/assets/programs/programs.js"></script>

@overwrite

@section("content")
    <div class="container-fluid" >
        @include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>   
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="rstart-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="frs-left col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="rstart-logo">
                        <img src="/ico/R'ONE logo.png" alt="">
                        <p>START</p>
                    </div>
                    <div class="rstart-txt-cnt col-sm-7 col-md-7 col-lg-7">
                        <div class="for_whm">
                            <p>ДЛЯ КОГО</p>
                            <img src="/ico/14+.svg">
                        </div>
                        <p class="rst_ctn">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus iaculis tellus, id feugiat purus pharetra vitae. Nulla facilisi. Sed at condimentum augue, at interdum leo. Maecenas eu interdum ipsum, id aliquam nibh. Nam molestie velit et turpis rutrum, quis rutrum leo accumsan. Vivamus nec laoreet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec justo rutrum, vehicula magna in, tempus metus.
                        </p>
                        <button type="button">ПРОБОВАТЬ БЕСПЛАТНО</button>
                    </div>
                    <div class="rstart-img-cnt col-sm-5 col-md-5 col-lg-5">
                        <img src="/ico/easy_lvl.svg" class="frs_imgs">
                        <p>начальный уровень</p>
                        <br>
                        <img src="/ico/woman.svg" class="sex frs_imgs">
                        <img src="/ico/man.svg" class="sex frs_imgs">
                        <p>для женщин и мужчик</p>
                        <img src="/ico/butt.svg" class="frs_imgs">
                        <p>для похудения<br>и поддержания формы</p>
                    </div>
                </div>
                <img src="/ico/prstart.jpg" class="hidden-xs col-sm-5 col-md-5 col-lg-5 startimg">
            </div>
            <div class="tcount-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="prgr_name_st">START</p>
                <div class="pdd col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">28</p>
                    <p class="tc_t">ДНЕЙ</p>
                </div>
                <div class="pdd col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">20</p>
                    <p class="tc_t">ТРЕНИРОВОК</p>
                </div>
                <div class="pdd col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">8</p>
                    <p class="tc_t">ВЫХОДНЫХ</p>
                </div>
                <div class="pdd col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <p class="tc_d">50</p>
                    <p class="tc_t">ЗАДАНИЙ</p>
                </div>
            </div>
            <hr>
            <div class="info-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>ПОДРОБНЕЕ</h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" >
                            <div class="video_slide">
                                <img src="" alt="" class="comm_img_hldr video_holder" >
                                <img src="/ico/play.png" alt="" class="ico_play" class="comm_pl_hldr" data-id="">
                            </div>
                            <div class="content-slide">
                                <p>БЕГ</p>
                                <p>Здесь будет более детальное описание<br>конкретных групп заданий, на какие<br>группы мышц и т.д.Здесь будет более<br> детальное описаниеконкретных групп<br> заданий, на какие группы мышц и т.д.</p>
                                <button type="button">ПРОБОВАТЬ БЕСПЛАТНО</button> 
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
