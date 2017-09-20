<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="/assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/bootstrap-select/dist/css/bootstrap-select.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/perfect-scrollbar.min.css">
    <link href="/assets/navigation/css/component.css" type="text/css" rel="stylesheet">
    <link href="/assets/navigation/css/user.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/modal.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/jquery-ui-1.12.1.custom/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/layout.css">
    <link href="/assets/css/calendar.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.css">
    <link rel="stylesheet" href="/assets/lightbox/dist/css/lightbox.min.css">
    <link rel="shortcut icon" href="{{ asset('ico/faviсon.png') }}" type="image/png" />

	<title>Reformator.ONE</title>

    @section('css')
        
    @show
	
</head>
<body id="top">
        <div id="st-container" class="st-container">
            @if ($user = Sentinel::check())
                <nav class="st-menu st-effect-2 col-xs-5 col-sm-5 col-lg-2 col-md-2" id="menu-2">
                    <ul>
                        <li>
                            @if (!empty($user->user_ava_url))
                                <img src="{{'/image/logos/'.$user->user_ava_url}}" alt="" class="img-circle logo-img">
                            @else
                                <img src="/image/logos/default.jpg" alt="" class="img-circle logo-img">
                            @endif   <p class="user-fln">{{$user->first_name}} <br> {{$user->surname}}<br><br><span class="l_mn_raiting">Ваш рейтинг: 158/110</span></p>
                        </li>
                        <li>
                           <a href="/{{$user->slug}}" class="profile_btns">
                                <i class="prgr_ico prof-disp"></i>
                                <p class="prof-disp" style="margin-left: 1px;">ПРОГРАММА</p></a> 
                        </li>
                        <li>
                           <a href="/{{$user->slug}}/edit" class="profile_btns"><i class="prof_ico prof-disp"></i><p class="prof-disp">ПРОФИЛЬ</p></a> 
                        </li>
                        <li>
                           <a href="/{{$user->slug}}/balance" class="profile_btns"><i class="wallet_ico prof-disp" style="
                           margin: 0 0 0 0.98em; width: 1.1em;"></i><p class="prof-disp">МОЙ СЧЁТ</p></a> 
                        </li>
                        <li>
                            <a href="/{{$user->slug}}/faq" class="profile_btns help">
                                <i class="help_ico prof-disp"></i>
                                <p class="prof-disp">ПОМОЩЬ</p>
                            </a> 
                        </li>
                     </ul>                
                </nav>
            @else
                <nav class="st-menu st-effect-2 col-xs-5 col-sm-5 col-lg-2 col-md-2" id="menu-2">
                    <ul>
                        <li>
                            <img src="/ico/min-logo.svg" class="side_logo" alt="">
                        </li>
                        <br><br>
                        <li>
                            <a href="/" class="profile_btns">
                                <p>ГЛАВНАЯ</p>
                            </a> 
                        </li>
                        <li>
                            <a href="/program" class="profile_btns">
                                <p>программа <br> тренировок</p>
                            </a> 
                        </li>
                        <li>
                            <a href="/bonus" class="profile_btns">
                                <p>бонусная <br> программа</p>
                            </a> 
                        </li>
                    </ul>                
                </nav>
            @endif
<!-- Шапка сайта -->
           <!-- content push wrapper -->
            <div class="st-pusher">
                <div class="st-content"><!-- this is the wrapper for the content -->
                @if ($user = Sentinel::check())
                    <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
                        <!-- Top Navigation -->
                        <div class="codrops-top clearfix ">
                            <div id="st-trigger-effects" class="column col-lg-1 col-md-1 col-sm-4 col-xs-4">
                                <button data-effect="st-effect-2" class="codrops-btn">
                                    <img src="/ico/menu1.svg" alt="">
                                </button>
                            </div>
                            <div class="col-lg-1 hidden-md hidden-sm hidden-xs">
                            </div>
                            <div class="col-lg-2 col-md-2 hidden-xs hidden-sm" style="height: 100%;">
                                <a href="/" class="min-logo"></a>
                            </div>
                            <!-- <div class="immunitet col-lg-3 col-md-3 hidden-sm hidden-xs"> -->
                            <div class="immunitet col-lg-3 col-md-3 hidden-sm hidden-xs" data-toggle="modal" data-target="#balance_motions">
                                <span class="nav-text iimtxt" style="position: absolute; margin: 0 0 0 -11em;">Ваши иммунитеты:</span>
                               <!--  <div class="hearts col-lg-6 col-md-6">  -->
                                    <?php 
                                        $empty_hearts = 5;
                                        $full_hearts = $user->immunity_count;
                                        $empty_hearts -= $full_hearts;
                                    ?>
                                    
                                    @if ( !empty($full_hearts) )
                                        @for ($i=0; $i<$full_hearts; $i++)
                                            <i class="fa fa-heart fa-2x c-orange" aria-hidden="true"></i>
                                        @endfor
                                    @endif

                                    @if ( $empty_hearts > 0 )
                                        @for ($i=0; $i<$empty_hearts; $i++)
                                            <i class="fa fa-heart-o fa-2x c-white" aria-hidden="true"></i>
                                        @endfor
                                    @endif
                                <!-- </div> -->
                            </div>
                            <div class="score nav-text col-lg-2 col-md-2 hidden-xs hidden-sm" > <a href="{{$user->slug}}/balance" class="wals">
                                <p>Ваш счёт:&nbsp;{{ !empty($user->balance) ? number_format($user->balance->sum, 0, ',', ' ') : 0 }}&nbsp;</p> 
                                </a>                            
                            </div>
                            <div class="envelop col-lg-1 col-md-1 col-sm-4 col-xs-4" >
                                <a href="/messages/1">
                                    <img class="envel" src="/ico/envelop.png" alt="envelop">
                                </a>
                            </div>
                            <div class="drop-text dropdown col-lg-2 col-md-3 col-sm-4 col-xs-4 ">
                                <button class="dropdown-toggle" type="button" id="nav-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <div>
                                        <span class="user-name">{{$user->first_name}}</span>
                                    </div>
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </button>
                                <ul class="user_dropdown dropdown-menu dropdown-menu-right" aria-labelledby="nav-dropdown">
                                    <li><a href="/{{$user->slug}}">ПРОГРАММА <b class="hidden-xs">ТРЕНИРОВОК</b></a></li>
                                    <li><a href="/{{$user->slug}}/edit">ПРОФИЛЬ</a></li>
                                    <li><a href="/logout">ВЫЙТИ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /st-content-inner -->

                @endif
                    @section("content")

                    @show 
                </div><!-- /st-content -->
            </div><!-- /st-pusher -->
        </div><!-- /st-container -->
<div class="modal fade" id="balance_motions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog bal_modal_width" role="document">
    <div class="modal-content bal_modal_height">
      <div class="modal-body">
        <button type="button" class="close cls_mod_btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="input_money">
            <form action="">
                <p class="add_money">ПОПОЛНИТЬ СЧЕТ</p>
                <input type="text" value="250" class="money_inputs" style="text-align: center; padding: 0; font-family:MuseoSansCyrl_500; color: #ff8a18; font-size: 1.2vw;" placeholder="Сумма">
                <select class="selectpicker" name="program_id" id="program_id" >
                    <option value="">Купить иммунтиеты</option> 
                    <option value="">Оплатить программу</option>  
                </select>
                <img src="/ico/drop-ico.png" style="z-index: 9999; margin: -4.5em 0 0 13.2em;
"></img>
                <input type="submit" value="ПОПОЛНИТЬ" class="send">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!--
<div class="tooltip_templates" style="display: none;">
    <span id="immun_tooltip_content">
        <p>Иммунитет - это ваше здоровье на этом курсе. Если Вы не выполнили какое-либо задание, Вы теряете одно сердчкою.</p>
    </span>
    <span>
        <p id="score_tooltipe">
            Ваш счёт - Это деньги которые можно потратить на иммунитет, также их можно вывести.
        </p>
    </span>
    <span>
        <p id="envelop_tooltipe">
            Все сообщения от преподавателя или какие-либо оповещения приходят Вам в сообщения. Там же Вы можете задать любые вопросы или попросить о помощи. 
        </p>
    </span>
    <span>
        <p id="calendar_tooltipe">
            Календарь Ваших тренировок включает в себя 28 дней вместе с выходными. Каждый день выполняйте задания и загружайте отчёты в формы. У каждого дня есть уровень сложности и затрачиваемое время. <br> Дни проверенные преподавателем отмечены зелёным смайликом. Выходные дни отмечены солнышком. 
        </p>
    </span>
    <span>
        <p id="otchet_tooltipe">
            Полсе выполнения задания, Вам необходимо загрузить отчёт в соответствующую форму с заданием
        </p>
    </span>
</div>
-->

    <script type="text/javascript" src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>    
    <script type="text/javascript" src="/assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="/assets/navigation/js/classie.js"></script>
    <script type="text/javascript" src="/assets/navigation/js/sidebarEffects.js"></script>
    <script type="text/javascript" src="/assets/js/calendar.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
    <script type="text/javascript" src="/assets/lightbox/dist/js/lightbox.min.js"></script>

    @if (count($errors->all()) > 0)
        <?php
            $errorStr = '';
            foreach ($errors->all() as $error) {
                $errorStr .= $error." ";
            } 
        ?>
        <script type="text/javascript">
            swal({
                title: 'Ошибка',
                text: "{{$errorStr}}",
                type: "danger",
                showCancelButton: false,
                showConfirmButton: false,
            }).then (function () {}
            );
        </script>
    @endif

    @section('js')
        
    @show

</body>
</html>