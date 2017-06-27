@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/lk_edit.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/privat_account/lk_edit.js?342423"></script>    

@overwrite


@section("content")
	<div class="left_edit_part col-xs-5 col-sm-5 col-lg-2 col-md-2">
		<nav>
            <ul>
                <li style="padding: 0 0 1em 0; 	box-shadow: inset 0 -1px rgba(0,0,0,0.2);">
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
	<div class="right_edit_part col-xs-7 col-sm-7 col-lg-10 col-md-10">
		<p class="my_acc">МОЙ АККАУНТ</p>
		<div class="row">
			<span class="m_usr_img col-lg-1">
                @if (!empty($user->user_ava_url))
                    <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                @else
                    <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                @endif                
            </span>
			<span class="m_usr_dscr col-lg-11">
				<p class="usr_name">{{$user->surname.' '.$user->first_name.' '.$user->last_name}}</p>
				<div class="ld_img">
					<form enctype="multipart/form-data" id="download-logos-form" role="form" method="POST" action="" >	
						<input type="file" multiple="multiple" name="logo" accept="image/*" id="download-logos" title="Загрузить фото" style="height: 100%; width: 10em;">
						<p id="load_photo_txt">Заргузить фото</p>
					</form>
				</div>
			</span>
		</div>
		@include('privat_office._partials.user_data')
		@include('privat_office._partials.change_user_data_form')
	</div>
@overwrite
