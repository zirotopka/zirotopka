    <div class="office_sidebar col-xs-4 col-sm-4 col-lg-2 col-md-2" style="height: 100%; padding: 0; z-index: 1">
               <nav class="left_edit_part">
                    <ul>
                        <li>
                            @if (!empty($user->user_ava_url))
                                <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                            @else
                                <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                            @endif   <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}} <br></p>

                        </li>
                        <li>
                           <a href="/{{$user->slug}}" class="profile_btns">
                                <i class="prgr_ico prof-disp"></i>
                                <p class="prof-disp" style="padding-left: 5px!important;">ПРОГРАММА</p></a>
                        </li>
                        <li>
                           <a href="/{{$user->slug}}/edit" class="profile_btns">
                                <i class="prof_ico prof-disp"></i>
                                <p class="prof-disp" style="padding-left: 6px;">ПРОФИЛЬ</p></a>
                        </li>
                        <li>
                           <a href="/{{$user->slug}}/balance" class="profile_btns"><i class="wallet_ico prof-disp" style="margin: 0 0 0 0.98em; width: 1em; height: 0.9em;"></i><p class="prof-disp" style="padding-left: 10px;">МОЙ СЧЁТ</p></a>
                        </li>
                        <li>
                            <a href="/{{$user->slug}}/faq" class="profile_btns help">
                                <i class="help_ico prof-disp"></i>
                                <p class="prof-disp" style="padding-left: 5px;">ПОМОЩЬ</p>
                            </a> 
                        </li>
                     </ul>                
                </nav>
    </div>