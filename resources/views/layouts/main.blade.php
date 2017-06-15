<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width">

	<link href="/assets/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/navigation/css/component.css" type="text/css" rel="stylesheet">
    <link href="/assets/navigation/css/user.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/modal.css" type="text/css" rel="stylesheet">
    <link href="/assets/tooltipster-master/dist/css/tooltipster.bundle.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/tooltipster-master/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/tooltips.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



	<title>Жиротопка</title>

    @section('css')
        
    @show
	
</head>
<body>
        <div id="st-container" class="st-container">
            <nav class="st-menu st-effect-2 col-xs-5 col-sm-5 col-lg-2 col-md-2" id="menu-2">
                <ul>
                    <li><a class="icon icon-data" href="/">Главная</a></li>
                    <?php
                        $programms = App\Programm::select('id','name','slug')->get();
                    ?>
                    @forelse ($programms as $programm)
                        <li><a class="icon icon-photo" data-id="{{$programm->id}}" href="#{{$programm->slug}}">{{$programm->name}}</a></li>
                    @empty
                    @endforelse
                    <li><a class="icon icon-photo" href="#">Бонусная программа</a></li>
                 </ul>                
            </nav>
           <!-- content push wrapper -->
            <div class="st-pusher">
                <div class="st-content"><!-- this is the wrapper for the content -->
                    <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
                        <!-- Top Navigation -->
                        <div class="codrops-top clearfix ">
                            <div id="st-trigger-effects" class="column col-lg-1 col-md-1 col-sm-4 col-xs-4">
                                <button data-effect="st-effect-2" class="codrops-btn">
                                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="col-lg-1 hidden-md hidden-sm hidden-xs">
                            </div>
                            <div class="col-lg-2 col-md-2 hidden-xs hidden-sm" style="height: 100%;">
                                <a href="/" class="min-logo"></a>
                            </div>
                       @if ($user = Sentinel::check())
                            <!-- <div class="immunitet col-lg-3 col-md-3 hidden-sm hidden-xs"> -->
                            <div class="tooltipstered immunitet col-lg-3 col-md-3 hidden-sm hidden-xs" data-tooltip-content="#immun_tooltip_content">
                                <span class="nav-text" style="position: absolute; margin: 0 0 0 -11em;">Ваши иммунитеты:</span>
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

                                    {{-- @for ($i=0; $i<5; $i++) --}}
                                        <!-- <img class="heart" src="/ico/heart.png" alt=""> -->
                                    {{-- @endfor --}}
                                <!-- </div> -->
                            </div>
                            <div class="score nav-text col-lg-2 col-md-2 hidden-xs hidden-sm" >
                                <p>Ваш счёт:&nbsp;{{ !empty($user->balance) ? $user->balance->sum : 0 }}&nbsp;$</p>                             
                            </div>
                            <div class="envelop col-lg-1 col-md-1 col-sm-4 col-xs-4" >
                                <a href="">
                                    <img class="envel" src="/ico/envelop.png" alt="envelop">
                                </a>
                            </div>
                            <div class="drop-text dropdown col-lg-2 col-md-3 col-sm-4 col-xs-4 ">
                                <button class="dropdown-toggle" type="button" id="nav-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <div style="display: inline-block;">{{$user->first_name.' '.$user->last_name}}</div>
                                <i class="fa fa-caret-down" aria-hidden="true"></i>

                                </button>
                                <ul class="user_dropdown dropdown-menu dropdown-menu-right" aria-labelledby="nav-dropdown">
                                    <li><a href="/lk/{{$user->id}}">МОЙ АККАУНТ</a></li>
                                    <li><a href="/logout">ВЫЙТИ</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="reg_log_btn">
                                <button type="button" class=" btn btn-primary " data-toggle="modal" data-target="#registr">
                                    Регистрация
                                </button>
                                <button type="button" class=" btn btn-primary " data-toggle="modal" data-target="#login">
                                    Войти
                                </button>
                            </div>
                        @endif
                        </div>


                                           </div><!-- /st-content-inner -->
                    {{-- @include('layouts.reg_modal') --}}
                    @section("content")

                    @show 
                </div><!-- /st-content -->
            </div><!-- /st-pusher -->
        </div><!-- /st-container -->
        

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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>    
    <script type="text/javascript" src="/assets/navigation/js/classie.js"></script>
    <script type="text/javascript" src="/assets/navigation/js/sidebarEffects.js"></script>
    <script type="text/javascript" src="/assets/tooltipster-master/dist/js/tooltipster.bundle.min.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>
    
    @section('js')
        
    @show

</body>
</html>