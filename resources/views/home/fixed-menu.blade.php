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
                    <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}}</p>
                </li>
                <li>
                    <a href="/lk/{{$user->id}}" class="profile_btns lgn">
                        <i class="prgr_ico prof-disp"></i>
                        <p class="prof-disp" style="margin-left: 1px;">ПРОГРАММА</p></a> 
                </li>
                <li>
                    <a href="/lk/{{$user->id}}/edit" class="profile_btns lgn"><i class="prof_ico prof-disp"></i><p class="prof-disp" style="margin-left: 9px!important;">ПРОФИЛЬ</p></a> 
                </li>
                <li>
                    <a href="/lk/{{$user->id}}/balance" class="profile_btns lgn"><i class="wallet_ico prof-disp" style="
                           margin: 0 0 0 0.98em; width: 16px;"></i><p class="prof-disp">МОЙ СЧЁТ</p></a> 
                </li>
                <li>
                    <a href="/lk/{{$user->id}}/faq" class="profile_btns help lgn">
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
                <li>
                    <img src="/ico/main_logo.png" class="side_logo" alt="">
                </li>
                <br><br>
                <li>
                    <a href="/" class="profile_btns" style="padding:1.5em 0 1em 4em!important">
                        <p>ГЛАВНАЯ</p>
                    </a> 
                </li>
                <li>
                    <a href="" class="profile_btns" id="prgr_l_mn">
                        <p>программа <br> тренировок</p>
                    </a> 
                </li>
                <li>
                    <a href="" class="profile_btns" id="bns_l_mn">
                        <p>бонусная <br> программа</p>
                    </a> 
                </li>
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
                        <p>04 БОНУСЫ</p>
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
                    <a href="#top" class="spy_sections top_section" >
                        <p>НАВЕРХ</p>
                    </a>

            </ul>                
        </nav>
    </div>


@endif