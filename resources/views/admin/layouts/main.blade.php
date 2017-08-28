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

    

    <title>Reformator.ONE</title>

    @section('css')
        
    @show
    
</head>
<body>
    <div id="st-container" class="st-container">
        <nav class="st-menu st-effect-2 col-xs-5 col-sm-5 col-lg-2 col-md-2">
            <ul>
                <li>
                    <a href="/admin/users" class="profile_btns"><p class="prof-disp">Пользователи</p></a> 
                </li>
                <li>
                    <a href="/admin/accruals" class="profile_btns"><p class="prof-disp">Счета</p></a> 
                </li>
                <li>
                    <a href="/admin/messages/2" class="profile_btns"><p class="prof-disp">Сообщения</p></a>
                </li>
                <li>
                    <a href="/admin/tasks" class="profile_btns"><p class="prof-disp">Задания</p></a>
                </li>
            </ul>
        </nav>
<!-- Шапка сайта -->
       <!-- content push wrapper -->
        <div class="st-pusher">
            <div class="st-content"><!-- this is the wrapper for the content -->
                <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
                    <!-- Top Navigation -->
                    <div class="codrops-top clearfix ">
                        <div id="st-trigger-effects" class="column col-lg-1 col-md-1 col-sm-4 col-xs-4">
                            <button data-effect="st-effect-2" class="codrops-btn">
                                <img src="/ico/menu.png" alt="">
                            </button>
                        </div>
                    </div>
                </div><!-- /st-content-inner -->

                @section("content")

                @show 
            </div><!-- /st-content -->
        </div><!-- /st-pusher -->
    </div><!-- /st-container -->


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

    
    @section('js')
        
    @show

</body>
</html>