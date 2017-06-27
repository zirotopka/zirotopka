    <div class=" col-xs-4 col-sm-4 col-lg-2 col-md-2" style="height: 100%; padding: 0; z-index: 1">
        <nav class="left_edit_part">
            <ul>
                <li style="padding: 0 0 1em 0;  box-shadow: inset 0 -1px rgba(0,0,0,0.2);">
                            @if (!empty($user->user_ava_url))
                                <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                            @else
                                <img src="/image/test/user.png" alt="" class="img-circle logo-img">
                            @endif                    <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}}</p>
                </li>
                <li>
                    <a href="/lk/{{$user->id}}/edit" class="profile_btns">
                        <i class="prof_ico prof-disp"></i>
                        <p class="prof-disp">  ПРОФИЛЬ</p>
                    </a> 
                </li>
                <li>
                    <a href="/lk/{{$user->id}}/balance" class="profile_btns">
                        <i class="wallet_ico prof-disp"></i>
                        <p class="prof-disp">МОЙ СЧЁТ</p>
                    </a> 
                </li>
            </ul>                
        </nav>
    </div>