<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    <link href="/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="/navigation/css/component.css" type="text/css" rel="stylesheet">
    <link href="/navigation/css/user.css" type="text/css" rel="stylesheet">
    <link href="/css/modal.css" type="text/css" rel="stylesheet">


	<title>Жиротопка</title>

    @section('css')
        
    @show
	
</head>
<body>
        <div id="st-container" class="st-container">
            <nav class="st-menu st-effect-2 col-xs-5 col-sm-5 col-lg-2 col-md-2" id="menu-2">
                <ul>
                    <li><a class="icon icon-data" href="#">Главная</a></li>
                    <li><a class="icon icon-location" href="#">R.one start</a></li>
                    <li><a class="icon icon-study" href="#">r.one pro</a></li>
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
                            <!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registr">
                                Регистрация
                            </button>-->
                            <div class="col-lg-1 hidden-md hidden-sm hidden-xs">
                                
                            </div>
                            <div class="min-logo col-lg-2 col-md-2 hidden-xs hidden-sm">
                                <a href="/">
                                    <img src="/min-logo.png" alt="">
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                                <span class="immunitet nav-text">Ваши иммунитеты:</span>
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
                            <div class="score nav-text col-lg-2 col-md-2 hidden-xs hidden-sm">
                                <p>Ваш счёт:&nbsp;{{ !empty($user->balance) ? $user->balance->sum : 0 }}&nbsp;$</p>                             
                            </div>
                            <div class="envelop col-lg-1 col-md-1 col-sm-4 col-xs-4">
                                <a href="">
                                    <img class="envel" src="/ico/envelop.png" alt="envelop">
                                </a>
                            </div>
                            <div class="dropdown col-lg-2 col-md-3 col-sm-4 col-xs-4 ">
                                <button class="dropdown-toggle" type="button" id="nav-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    {{$user->first_name.' '.$user->last_name}}
                                <i class="fa fa-caret-down" aria-hidden="true"></i>

                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-dropdown">
                                    <li><a href="">asd</a></li>
                                    <li><a href="">asd</a></li>
                                    <li><a href="">asd</a></li>
                                    <li><a href="">asd</a></li>                                    
                                </ul>
                            </div>
                        </div>
                        <div class="main">
                            {{-- @include('layouts.reg_modal') --}}
                        </div> 
                    </div><!-- /st-content-inner -->
                    @section("content")
                    @show 
                </div><!-- /st-content -->
            </div><!-- /st-pusher -->
        </div><!-- /st-container -->

    @section('js')
        
    @show
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/navigation/js/classie.js"></script>
    <script type="text/javascript" src="/navigation/js/sidebarEffects.js"></script>


</body>
</html>