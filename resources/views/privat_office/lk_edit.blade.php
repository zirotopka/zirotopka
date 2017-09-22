@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/lk_edit.css" type="text/css" rel="stylesheet">
    <link href="/assets/privat_account/sidebar.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/css/jquery.customSelect.min.js"></script>   
    <script type="text/javascript" src="/assets/js/inputmask/inputmask.min.js"></script>
	<script type="text/javascript" src="/assets/js/inputmask/jquery.inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/inputmask/inputmask.phone.extensions.min.js"></script>
    <script type="text/javascript" src="/assets/privat_account/lk_edit.js"></script>
     

@overwrite


@section("content")
	@include('layouts.office_left_menu')
	<div class="right_edit_part col-xs-12 col-sm-12 col-lg-10 col-md-10">
		<p class="my_acc">МОЙ АККАУНТ</p>
		<div class="row">
			<span class="m_usr_img col-lg-1 col-md-1 col-sm-6 col-xs-6">
                @if (!empty($user->user_ava_url))
                    <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                @else
                    <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                @endif                
            </span>
			<span class="m_usr_dscr col-lg-11 col-sm-11 col-sm-6 col-xs-6">
				<p class="usr_name">{{$user->surname.' '.$user->first_name.' '.$user->last_name}}</p>
				<span class="l_mn_raiting lk_raiting" data-toggle="modal" data-target="#rait">Ваш рейтинг: 158/110.</span>
				<div class="ld_img">
					<form enctype="multipart/form-data" id="download-logos-form" role="form" method="POST" action="" >	
						<input type="file" multiple="multiple" name="logo" accept="image/*" id="download-logos" title="Загрузить фото" style="height: 100%; width: 10em;">
						<p id="load_photo_txt">Загрузить фото</p>
					</form>
				</div>
			</span>
		</div>
		@include('privat_office._partials.user_data')
		@include('privat_office._partials.change_user_data_form')		
	</div>
<div class="modal fade" id="rait" tabindex="-1" role="dialog" aria-labelledby="raiting_hint">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content raitc">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><img src="/ico/close.png" alt="" id="closert"></button>
        <div class="hint_content">
        	<p>Из чего складывается: Привлек<br> человека получи 3 балла, его реферал<br> привел человека получил - 2 балла, реферал - <br>реферала привел человека - 1 балл. </p>
        </div>
      </div>
    </div>
  </div>
</div>
@overwrite

