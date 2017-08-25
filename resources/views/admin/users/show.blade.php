@extends('admin.layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/lk_edit.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/admin/users.css">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->

    <script type="text/javascript" src="/assets/js/inputmask/inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/inputmask/jquery.inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/inputmask/inputmask.phone.extensions.min.js"></script>
    <script type="text/javascript" src="/assets/privat_account/lk_edit.js"></script>

@overwrite


@section("content")
    <div class="right_edit_part col-xs-12 col-sm-12 col-lg-10 col-md-10">
        <p class="my_acc">АККАУНТ</p>
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
			</span>
        </div>
        @include('admin.users._partials.user_data')
    </div>
@overwrite

