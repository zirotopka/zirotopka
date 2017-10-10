@if ($user = Sentinel::check())
    <div class="main_sidebar hidden-xs hidden-sm col-lg-2 col-md-2" style="height: 100%; padding: 0; z-index: 1">
        <nav class="left_edit_part">
            <ul>
                <li class="usr_img_mn">
                    @if (!empty($user->user_ava_url))
                         <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                    @else
                        <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                    @endif   
                    <p class="user-fln">{{$user->first_name}}<br>{{$user->surname}}<br><br><span class="l_mn_raiting">Ваш рейтинг: {{$user->first_rating.'/'.$user->second_rating}}</span></p>
                </li>
                <li>
                    <a href="/{{$user->slug}}" class="profile_btns lgn">
                        <i class="prgr_ico prof-disp"></i>
                        <p class="prof-disp" style="margin-left: 1px;">ПРОГРАММА</p></a> 
                </li>
                <li>
                    <a href="/{{$user->slug}}/edit" class="profile_btns lgn"><i class="prof_ico prof-disp"></i><p class="prof-disp" style="margin-left: 9px!important;">ПРОФИЛЬ</p></a> 
                </li>
                <li>
                    <a href="/{{$user->slug}}/balance" class="profile_btns lgn"><i class="wallet_ico prof-disp" style="
                           margin: 0 0 0 0.98em; width: 1em; height: 0.9em;"></i><p class="prof-disp">МОЙ СЧЁТ</p></a> 
                </li>
                <li>
                    <a href="/{{$user->slug}}/faq" class="profile_btns help lgn">
                        <i class="help_ico prof-disp"></i>
                        <p class="prof-disp">ПОМОЩЬ</p>
                    </a> 
                </li>
            </ul>                
        </nav>
    </div>
@else
    <div class="main_sidebar hidden-xs hidden-sm col-lg-2 col-md-2" style="height: 100%; padding: 0; z-index: 1">
        <nav class="navbar spy-active" id="Scrollspy">
            <ul class="nav">
                <li style="text-align: center;">
                    <a href="/" style="padding: 0;" class="logohov">    
                        <img src="/ico/min-logo.svg" class="side_logo" alt="">
                    </a>
                </li>
                <br><br>
                <li>
                    <a href="/" class="profile_btns" id="mn_l_mn" style="padding:1.5em 0 1em 4em!important">
                        <p>ГЛАВНАЯ</p>
                    </a> 
                </li>
                <div class="index_spy">
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#section_2" class="spy_sections" >
                            <p>02 ОПИСАНИЕ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#section_3" class="spy_sections">
                            <p>03 ПРОГРАММЫ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#section_4" class="spy_sections">
                            <p>04 БОНУСНАЯ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#section_5" class="spy_sections">
                            <p>05 КАК РАБОТАЕТ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc"> 
                        <p class="fm_line">|</p>
                        <a href="#section_6" class="spy_sections">
                            <p>06 ОТЗЫВЫ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#section_7" class="spy_sections">
                            <p>07 ВОПРОСЫ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#section_8" class="spy_sections">
                            <p>08 ДОСТУП</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                </div>
                <li>
                    <a href="/programm/ROneStart" class="profile_btns" id="prgr_l_mn">
                        <p>программа <br> тренировок</p>
                    </a> 
                </li>
                <div class="programm_spy">
                    <li class="sc strt">
                        <p class="fm_line">|</p>
                        <a href="/programm/ROneStart">
                            <p>03 R.ONE START</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc pro">
                        <p class="fm_line">|</p>
                        <a href="/programm/r.one_pro">
                            <p>04 R.ONE PRO</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc run">
                        <p class="fm_line">|</p>
                        <a href="/programm/r.one_runner">
                            <p>05 R.ONE RUN</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc runp">
                        <p class="fm_line">|</p>
                        <a href="/programm/r.one_runner_plus">
                            <p>06 R.ONE RUN+</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc pow">
                        <p class="fm_line">|</p>
                        <a href="/programm/r.one_power">
                            <p>07 R.ONE POWER</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>

                </div>
                <li>
                    <a href="/bonus" class="profile_btns" id="bns_l_mn">
                        <p>бонусная <br> программа</p>
                    </a> 
                </li>
                <div class="bonus_spy">
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#bonus_2" class="spy_sections">
                            <p>04 КАК РАБОТАЕТ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#bonus_3" class="spy_sections">
                            <p>05 О НАС</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#bonus_4" class="spy_sections">
                            <p>06 О СЕРВИСЕ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc"> 
                        <p class="fm_line">|</p>
                        <a href="#bonus_5" class="spy_sections">
                            <p>07 ВОПРОСЫ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                    <li class="sc">
                        <p class="fm_line">|</p>
                        <a href="#bonus_6" class="spy_sections">
                            <p>08 ПРИСОЕДИНИТЬСЯ</p>
                        </a> 
                        <p class="fm_line">|</p>
                    </li>
                </div>
                    <a href="#top" class="spy_sections top_section" >
                        <p>НАВЕРХ</p>
                    </a>

            </ul>                
        </nav>
    </div>


@endif