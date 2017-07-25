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
                    <a href="/lk/{{$user->id}}/edit" class="profile_btns lgn"><i class="prof_ico prof-disp"></i><p class="prof-disp">ПРОФИЛЬ</p></a> 
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
        <nav class="navbar" id="Scrollspy">
            <ul class="nav nav-pills nav-stacked" data-spy="affix">
                <li>
                    <img src="/ico/main_logo.png" class="side_logo" alt="">
                </li>
                <br><br>
                <li>
                    <a href="/" class="profile_btns" style="padding:1.7em 0 1em 4em!important">
                        <p>ГЛАВНАЯ</p>
                    </a> 
                </li>
                <li>
                    <a href="" class="profile_btns">
                        <p>программа <br> тренировок</p>
                    </a> 
                </li>
                <li>
                    <a href="" class="profile_btns">
                        <p>бонусная <br> программа</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_2" >
                        <p>02 ОПИСАНИЕ</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_3" >
                        <p>03 ПРОГРАММЫ</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_4" >
                        <p>04 БОНУСЫ</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_5" >
                        <p>05 КАК РАБОТАЕТ</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_6" >
                        <p>06 ОТЗЫВЫ</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_7" >
                        <p>07 ВОПРОСЫ</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_8" >
                        <p>08 ДОСТУП</p>
                    </a> 
                </li>
                <li>
                    <a href="#section_8" >
                        <p>НАВЕРХ</p>
                    </a> 
                </li>
            </ul>                
        </nav>
    </div>

@endif