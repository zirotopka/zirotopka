    <div class="office_sidebar col-xs-4 col-sm-4 col-lg-2 col-md-2" style="height: 100%; padding: 0; z-index: 1">
               <nav class="left_edit_part">
                    <ul>
                        <li>
                            @if (!empty($user->user_ava_url))
                                <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                            @else
                                <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                            @endif   <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}}</p>
                        </li>
                        <li>
                           <a href="/lk/{{$user->id}}" class="profile_btns">
                                <i class="prgr_ico prof-disp"></i>
                                <p class="prof-disp" style="margin-left: 1px;">ПРОГРАММА</p></a> 
                        </li>
                        <li>
                           <a href="/lk/{{$user->id}}/edit" class="profile_btns">
                                <i class="prof_ico prof-disp"></i>
                                <p class="prof-disp" style="margin-left: 2px;">ПРОФИЛЬ</p></a> 
                        </li>
                        <li>
                           <a href="/lk/{{$user->id}}/balance" class="profile_btns"><i class="wallet_ico prof-disp" style="width: 15px; margin: 0 0 0 10px"></i><p class="prof-disp" style="margin-left: 5px;">МОЙ СЧЁТ</p></a> 
                        </li>
                        <li>
                            <a href="/lk/{{$user->id}}/faq" class="profile_btns help">
                                <i class="help_ico prof-disp"></i>
                                <p class="prof-disp" style="margin-left: 4px;">ПОМОЩЬ</p>
                            </a> 
                        </li>
                     </ul>                
                </nav>
    </div>