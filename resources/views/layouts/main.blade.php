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


	<title>Жиротопка</title>

    @section('css')
        @yield('css')
    @show
	
</head>
<body>
        <div id="st-container" class="st-container">
            <!--    
                example menus 
                these menus will be on top of the push wrapper
            -->

            
            <nav class="st-menu st-effect-2 col-xs-5 col-sm-5 col-lg-2 col-md-2" id="menu-2">
                <h2 class="icon icon-stack">Sidebar</h2>
                <ul>
                    <li><a class="icon icon-data" href="#">Data Management</a></li>
                </ul>
            </nav>
           <!-- content push wrapper -->
            <div class="st-pusher">
                <div class="st-content"><!-- this is the wrapper for the content -->
                    <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
                        <!-- Top Navigation -->
                        <div class="codrops-top clearfix ">
                            <div id="st-trigger-effects" class="column">
                                <button data-effect="st-effect-2">
                                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="main clearfix">
                            @section("content")
                            @show    
                        </div> 
                    </div><!-- /st-content-inner -->
                </div><!-- /st-content -->
            </div><!-- /st-pusher -->
        </div><!-- /st-container -->
            @include('layouts.topbar')
    @section('js')
        @yield('js')
    @show
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/navigation/js/classie.js"></script>
    <script type="text/javascript" src="/navigation/js/sidebarEffects.js"></script>


</body>
</html>