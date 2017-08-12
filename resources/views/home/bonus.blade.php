@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/home/reg-log_form.css" type="text/css" rel="stylesheet">
    <link href="/assets/home/bonus.css" type="text/css" rel="stylesheet">
@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
    <script type="text/javascript" src="/assets/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="/assets/home/bonus-scrollspy.js"></script>
    <script type="text/javascript" src="/assets/home/bonus.js"></script>
@overwrite

@section("content")
    <div class="container-fluid" >
        @include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>   
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
        @if ($user = Sentinel::check())
        
        @else
            <div id="st-trigger-effects" class="hidden-md hidden-lg">
                <button data-effect="st-effect-2" class="cdr-btn">
                    <img src="/ico/menu.svg" alt="" style="width: 5vw;">
                </button>
            </div>
        @endif
            <div class="bonus-content">
                <div class="bons-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>ЗАРАБАТЫВАЙТЕ ВМЕСТЕ<br>С НАШЕЙ БОНУСНОЙ ПРОГРАММОЙ</h1>
                    <p>Вы начинаете заниматься спортом<br>по любой программе на платформе,<br>приглашаете друзей и сразу зарабатываете</p>
                    <button type="button" class="reg_btn" data-toggle="modal" data-target="#registr">
                        РЕГИСТРАЦИЯ
                    </button>
                    <button type="button" class="abo_btn">
                        ПОДРОБНЕЕ
                    </button>
                    <img src="/ico/pig.svg" class="pig hidden-xs">
                </div>
                    <hr>
                <div class="bons-how-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_2">
                    <h2>КАК ЭТО РАБОТАЕТ</h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p class="how-content col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            Участником бонусной программы могут быть только<br>действующие участники любой из программ R.ONE. <br> Вы приглашаете своих партнёров в проект, давая<br>скидку на доступ и получить 500р с каждой <br> оплаты.
                        </p>
                        <p class="how-content col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            Начиная со 2 линии Вы получаете пассивный доход<br>от партнёров Вашей команды. Так же Ваши участники<br>следующей за вами линии тоже начинают получать<br>доход от тех людей, которых пригласили в проект Вы<br>или участники вашей линии.
                        </p>
                    </div>
                    <div class="mobimg visible-xs">
<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 20.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 2000 2000" style="enable-background:new 0 0 2000 2000;" xml:space="preserve">
<style type="text/css">
    @font-face{
        font-family:'MuseoSansCyrl-300'; 
        src: url('/fonts/MuseoSansCyrl_300.eot');
        src: local('☺'), url('/fonts/MuseoSansCyrl_300.woff') format('woff'), url('/fonts/MuseoSansCyrl_300.ttf') format('truetype'), url('/fonts/MuseoSansCyrl_300.svg') format('svg');
    }
    @font-face{
        font-family:'MuseoSansCyrl-500'; 
        src: url('/fonts/MuseoSansCyrl_500.eot');
        src: local('☺'), url('/fonts/MuseoSansCyrl_500.woff') format('woff'), url('/fonts/MuseoSansCyrl_500.ttf') format('truetype'), url('/fonts/MuseoSansCyrl_500.svg') format('svg');
    }
    @font-face{
        font-family:'MuseoSansCyrl-700'; 
        src: url('/fonts/MuseoSansCyrl_700.eot');
        src: local('☺'), url('/fonts/MuseoSansCyrl_700.woff') format('woff'), url('/fonts/MuseoSansCyrl_700.ttf') format('truetype'), url('/fonts/MuseoSansCyrl_700.svg') format('svg');
    }
    @font-face{
        font-family:'MuseoSansCyrl-900'; 
        src: url('/fonts/MuseoSansCyrl_900.eot');
        src: local('☺'), url('/fonts/MuseoSansCyrl_900.woff') format('woff'), url('/fonts/MuseoSansCyrl_900.ttf') format('truetype'), url('/fonts/MuseoSansCyrl_900.svg') format('svg');
    }
    .st0{fill:#FFFFFF;}
    .st1{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;}
    .st2{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.7701,11.7701;}
    .st3{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.7234,11.7234;}
    .st4{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.4566,11.4566;}
    .st5{fill:#FF8A18;}
    .st6{font-family:'MuseoSansCyrl-500';}
    .st7{font-size:31.614px;}
    .st8{fill:#A9B2BA;}
    .st9{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;}
    .st10{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.2285,12.2285;}
    .st11{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.6407,11.6407;}
    .st12{fill:none;stroke:#A9B2BA;stroke-miterlimit:10;stroke-dasharray:11.1924,11.1924;}
    .st131{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.9544,11.9544;}
    .st14{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.7689,11.7689;}
    .st15{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.9758,11.9758;}
    .st16{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.1062,12.1062;}
    .st17{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.9781,11.9781;}
    .st18{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.0781,12.0781;}
    .st19{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.1457,12.1457;}
    .st20{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.5213,11.5213;}
    .st21{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.734,11.734;}
    .st22{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.7009,12.7009;}
    .st23{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.387,12.387;}
    .st24{fill:#FF8A18;}
    .st25{fill:#FF8A18;}
    .st26{fill:#2F2F2F;}
    .st27{fill:#FF8A18;}
    .st28{font-family:'MuseoSansCyrl-300';}
    .st29{font-size:24.4343px;}
    .st30{font-family:'MuseoSansCyrl-900';}
    .st31{font-size:89.7028px;}
    .st32{font-family:'MuseoSansCyrl-700';}
    .st33{font-size:30px;}
</style>
<g>
    <line class="st0" x1="999.5" y1="335.7" x2="999.5" y2="806.7"/>
    <g>
        <line class="st1" x1="999.5" y1="335.7" x2="999.5" y2="341.7"/>
        <line class="st2" x1="999.5" y1="353.4" x2="999.5" y2="794.8"/>
        <line class="st1" x1="999.5" y1="800.7" x2="999.5" y2="806.7"/>
    </g>
</g>
<g>
    <line class="st0" x1="789.2" y1="805.7" x2="1000.5" y2="805.7"/>
    <g>
        <line class="st1" x1="789.2" y1="805.7" x2="795.2" y2="805.7"/>
        <line class="st3" x1="807" y1="805.7" x2="988.7" y2="805.7"/>
        <line class="st1" x1="994.5" y1="805.7" x2="1000.5" y2="805.7"/>
    </g>
</g>
<g>
    <line class="st0" x1="816.7" y1="335.7" x2="1000.5" y2="335.7"/>
    <g>
        <line class="st1" x1="816.7" y1="335.7" x2="822.7" y2="335.7"/>
        <line class="st4" x1="834.1" y1="335.7" x2="988.8" y2="335.7"/>
        <line class="st1" x1="994.5" y1="335.7" x2="1000.5" y2="335.7"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 822.7778 308.2222)" class="st5 st6 st7">+ 1000 руб.</text>
<polygon class="st8" points="788.7,1305.9 817.6,1322.6 817.6,1289.3 "/>
<g>
    <g>
        <line class="st9" x1="998" y1="1305" x2="998" y2="1311"/>
        <line class="st10" x1="998" y1="1323.2" x2="998" y2="1659.5"/>
        <line class="st9" x1="998" y1="1665.6" x2="998" y2="1671.6"/>
    </g>
</g>
<g>
    <line class="st0" x1="789" y1="1670.6" x2="998.9" y2="1670.6"/>
    <g>
        <line class="st9" x1="789" y1="1670.6" x2="795" y2="1670.6"/>
        <line class="st11" x1="806.6" y1="1670.6" x2="987.1" y2="1670.6"/>
        <line class="st9" x1="992.9" y1="1670.6" x2="998.9" y2="1670.6"/>
    </g>
</g>
<g>
    <line class="st0" x1="817.6" y1="1305.9" x2="997.5" y2="1305.9"/>
    <g>
        <line class="st9" x1="817.6" y1="1305.9" x2="823.6" y2="1305.9"/>
        <line class="st12" x1="834.8" y1="1305.9" x2="985.9" y2="1305.9"/>
        <line class="st9" x1="991.5" y1="1305.9" x2="997.5" y2="1305.9"/>
    </g>
</g>
<g>
    <line class="st0" x1="1235.8" y1="334.7" x2="1235.8" y2="1267.2"/>
    <g>
        <line class="st1" x1="1235.8" y1="334.7" x2="1235.8" y2="340.7"/>
        <line class="st131" x1="1235.8" y1="352.7" x2="1235.8" y2="1255.2"/>
        <line class="st1" x1="1235.8" y1="1261.2" x2="1235.8" y2="1267.2"/>
    </g>
</g>
<g>
    <line class="st0" x1="789" y1="1266.2" x2="1236.5" y2="1266.2"/>
    <g>
        <line class="st1" x1="789" y1="1266.2" x2="795" y2="1266.2"/>
        <line class="st14" x1="806.8" y1="1266.2" x2="1224.6" y2="1266.2"/>
        <line class="st1" x1="1230.5" y1="1266.2" x2="1236.5" y2="1266.2"/>
    </g>
</g>
<polygon class="st5" points="789.2,335.7 818.2,352.4 818.2,319 "/>
<g>
    <line class="st0" x1="1538.5" y1="335.7" x2="1538.5" y2="1748.9"/>
    <g>
        <line class="st1" x1="1538.5" y1="335.7" x2="1538.5" y2="341.7"/>
        <line class="st15" x1="1538.5" y1="353.7" x2="1538.5" y2="1736.9"/>
        <line class="st1" x1="1538.5" y1="1742.9" x2="1538.5" y2="1748.9"/>
    </g>
</g>
<g>
    <line class="st0" x1="789" y1="1747.9" x2="1539.5" y2="1747.9"/>
    <g>
        <line class="st1" x1="789" y1="1747.9" x2="795" y2="1747.9"/>
        <line class="st16" x1="807.1" y1="1747.9" x2="1527.4" y2="1747.9"/>
        <line class="st1" x1="1533.5" y1="1747.9" x2="1539.5" y2="1747.9"/>
    </g>
</g>
<polygon class="st5" points="1030.6,335.7 1059.5,352.4 1059.5,319 "/>
<g>
    <g>
        <line class="st9" x1="1465.3" y1="823.2" x2="1465.3" y2="829.2"/>
        <line class="st17" x1="1465.3" y1="841.2" x2="1465.3" y2="1697.6"/>
        <line class="st9" x1="1465.3" y1="1703.6" x2="1465.3" y2="1709.6"/>
    </g>
</g>
<g>
    <line class="st0" x1="789" y1="1708.6" x2="1465.3" y2="1708.6"/>
    <g>
        <line class="st9" x1="789" y1="1708.6" x2="795" y2="1708.6"/>
        <line class="st18" x1="807.1" y1="1708.6" x2="1453.2" y2="1708.6"/>
        <line class="st9" x1="1459.3" y1="1708.6" x2="1465.3" y2="1708.6"/>
    </g>
</g>
<polygon class="st8" points="1251.5,823.8 1280.5,840.5 1280.5,807.1 "/>
<g>
    <g>
        <line class="st9" x1="999.2" y1="840.8" x2="999.2" y2="846.8"/>
        <line class="st19" x1="999.2" y1="859" x2="999.2" y2="1217.3"/>
        <line class="st9" x1="999.2" y1="1223.4" x2="999.2" y2="1229.4"/>
    </g>
</g>
<g>
    <g>
        <line class="st9" x1="816.7" y1="840.9" x2="822.7" y2="840.9"/>
        <line class="st20" x1="834.2" y1="840.9" x2="989.7" y2="840.9"/>
        <line class="st9" x1="995.5" y1="840.9" x2="1001.5" y2="840.9"/>
    </g>
</g>
<polygon class="st8" points="789.2,840.9 818.1,857.6 818.1,824.2 "/>
<g>
    <g>
        <line class="st9" x1="788.7" y1="1228.6" x2="794.7" y2="1228.6"/>
        <line class="st21" x1="806.4" y1="1228.6" x2="988.3" y2="1228.6"/>
        <line class="st9" x1="994.2" y1="1228.6" x2="1000.2" y2="1228.6"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 1088.6602 308.2222)" class="st5 st6 st7">+ 150 руб.</text>
<polygon class="st5" points="1262.9,335.7 1291.8,352.4 1291.8,319 "/>
<g>
    <line class="st0" x1="1059.6" y1="335.7" x2="1236.7" y2="335.7"/>
    <g>
        <line class="st1" x1="1059.6" y1="335.7" x2="1065.6" y2="335.7"/>
        <line class="st22" x1="1078.3" y1="335.7" x2="1224.3" y2="335.7"/>
        <line class="st1" x1="1230.7" y1="335.7" x2="1236.7" y2="335.7"/>
    </g>
</g>
<g>
    <line class="st0" x1="1292.1" y1="335.7" x2="1539.5" y2="335.7"/>
    <g>
        <line class="st1" x1="1292.1" y1="335.7" x2="1298.1" y2="335.7"/>
        <line class="st23" x1="1310.5" y1="335.7" x2="1527.3" y2="335.7"/>
        <line class="st1" x1="1533.5" y1="335.7" x2="1539.5" y2="335.7"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 820.4683 881.9282)" class="st24 st6 st7">+ 1000 руб.</text>
<text transform="matrix(1 0 0 1 1345.6504 308.0278)" class="st5 st6 st7">+ 100 руб.</text>
<text transform="matrix(1 0 0 1 1303.125 807.0737)" class="st24 st6 st7">+ 150 руб.</text>
<text transform="matrix(1 0 0 1 817.2271 1354.4727)" class="st24 st6 st7">+ 1000 руб.</text>
<g>
    <g>
        <line class="st9" x1="1280.5" y1="824.2" x2="1286.5" y2="824.2"/>
        <line class="st20" x1="1298" y1="824.2" x2="1453.5" y2="824.2"/>
        <line class="st9" x1="1459.3" y1="824.2" x2="1465.3" y2="824.2"/>
    </g>
</g>
<g>
    <rect x="676.8" y="339.3" class="st25" width="49" height="24.5"/>
    <path class="st25" d="M724.9,255.3c11.6,13,10.5,32.9-2.5,44.4s-32.9,10.5-44.4-2.5c-10.7-12-10.7-30,0-42H724.9z"/>
    <path class="st26" d="M764.3,377.8v-42c0-14.4-9.7-26.8-23.6-30.4c16.1-21.7,11.5-52.4-10.2-68.6c-21.7-16.2-52.5-11.6-68.6,10.2
        c-12.8,17.4-12.8,41,0,58.3c-13.8,3.6-23.6,16.2-23.6,30.4v42c0,14.1,10.5,26,24.5,27.8v5.6c-12.6,4.4-20.9,16.3-21,29.7v3.5h119
        v-3.5c0-13.3-8.5-25.2-21-29.7v-5.6C753.8,403.8,764.3,391.9,764.3,377.8z M739.9,398.5v-13.7h16.2
        C753.6,391.9,747.3,397.2,739.9,398.5L739.9,398.5z M701.4,234.3c23.2,0,42,18.9,42,42.1c0,23.2-18.9,42-42.1,42
        c-23.2,0-42-18.8-42-42C659.4,253.1,678.2,234.3,701.4,234.3L701.4,234.3z M646.6,384.8h16.2v13.7
        C655.4,397.1,649.1,391.9,646.6,384.8z M673.4,416.3c8,0,15.5,3.9,20.1,10.4h-40.2C657.8,420.2,665.4,416.3,673.4,416.3
        L673.4,416.3z M649.1,437.3c0.2-1.2,0.4-2.4,0.8-3.5h46.9c0.3,1.1,0.6,2.3,0.8,3.5H649.1z M705.1,437.3c0.2-1.2,0.4-2.4,0.8-3.5
        h46.9c0.3,1.1,0.6,2.3,0.8,3.5H705.1z M749.4,426.8h-40.2c7.7-11.1,22.9-13.8,34-6.2C745.7,422.3,747.8,424.3,749.4,426.8z
         M729.4,409.3c-9.6,0-18.5,4.4-24.5,11.9v-36.3h-7v36.3c-6.7-8.5-17.3-12.9-28-11.6v-70.3h-7v38.5h-17.4v-42c0-12.6,9.5-23,22-24.4
        c19,18.5,49.2,18.5,68.1,0c12.5,1.4,21.9,11.8,21.9,24.4v42h-17.5v-38.5h-7v70.2C731.7,409.4,730.5,409.4,729.4,409.3L729.4,409.3z
        "/>
    <rect x="690.8" y="349.8" class="st26" width="21" height="7"/>
    <rect x="676.8" y="370.8" class="st26" width="7" height="7"/>
    <rect x="704.9" y="262.3" class="st26" width="7" height="7"/>
    <rect x="680.3" y="262.3" class="st26" width="17.5" height="7"/>
</g>
<g>
    <path class="st26" d="M735.3,826.7l-4.2,6.4c12.6,8.1,20.2,22,20.2,37v21h-47.5l27.9-47.8l-6.6-3.9l-23.5,40.2l-23.5-40.2l-6.6,3.9
        l27.9,47.8h-47.6v-21c0-15,7.6-28.9,20.2-37l-4.2-6.4c-14.8,9.5-23.7,25.9-23.7,43.5v28.6h114.7v-28.6
        C758.9,852.5,750,836.1,735.3,826.7z"/>
    <path class="st26" d="M659.2,791.8c0,23.3,18.9,42.2,42.2,42.2s42.2-18.9,42.2-42.2c0-23.4-19-42.2-42.2-42.2l0,0
        C678.1,749.5,659.2,768.5,659.2,791.8z M736,791.8c0,19-15.5,34.5-34.5,34.5S667,810.8,667,791.8s15.5-34.5,34.5-34.5
        C720.6,757.3,736,772.7,736,791.8L736,791.8z"/>
    <circle class="st25" cx="701.6" cy="792" r="34.7"/>
</g>
<g>
    <path class="st26" d="M735.7,1269l-4.2,6.4c12.6,8.1,20.2,22,20.2,37v21h-47.5l27.9-47.8l-6.6-3.9l-23.5,40.2l-23.5-40.2l-6.6,3.9
        l27.9,47.8h-47.6v-21c0-15,7.6-28.9,20.2-37l-4.2-6.4c-14.8,9.5-23.7,25.9-23.7,43.5v28.6h114.7v-28.6
        C759.3,1294.8,750.4,1278.4,735.7,1269z"/>
    <path class="st26" d="M659.6,1234.1c0,23.3,18.9,42.2,42.2,42.2s42.2-18.9,42.2-42.2c0-23.4-19-42.2-42.2-42.2l0,0
        C678.5,1191.8,659.6,1210.8,659.6,1234.1z M736.4,1234.1c0,19-15.5,34.5-34.5,34.5s-34.5-15.5-34.5-34.5s15.5-34.5,34.5-34.5
        C721,1199.6,736.4,1215,736.4,1234.1L736.4,1234.1z"/>
    <circle class="st25" cx="702" cy="1234.3" r="34.7"/>
</g>
<g>
    <path class="st26" d="M735.6,1711.1l-4.2,6.4c12.6,8.1,20.2,22,20.2,37v21h-47.5l27.9-47.8l-6.6-3.9l-23.5,40.2l-23.5-40.2
        l-6.6,3.9l27.9,47.8h-47.6v-21c0-15,7.6-28.9,20.2-37l-4.2-6.4c-14.8,9.5-23.7,25.9-23.7,43.5v28.6h114.7v-28.6
        C759.2,1736.9,750.3,1720.5,735.6,1711.1z"/>
    <path class="st26" d="M659.5,1676.2c0,23.3,18.9,42.2,42.2,42.2s42.2-18.9,42.2-42.2c0-23.4-19-42.2-42.2-42.2l0,0
        C678.4,1633.9,659.5,1652.9,659.5,1676.2z M736.3,1676.2c0,19-15.5,34.5-34.5,34.5s-34.5-15.5-34.5-34.5s15.5-34.5,34.5-34.5
        C720.9,1641.7,736.3,1657.1,736.3,1676.2L736.3,1676.2z"/>
    <circle class="st25" cx="701.9" cy="1676.4" r="34.7"/>
</g>
<g>
    <rect x="697.7" y="474.9" class="st8" width="8" height="180.9"/>
    <polygon class="st8" points="701.5,690.2 681.7,655.8 721.4,655.8    "/>
</g>
<g>
    <rect x="697.5" y="922.7" class="st8" width="8" height="180.9"/>
    <polygon class="st8" points="701.3,1138 681.5,1103.6 721.2,1103.6   "/>
</g>
<g>
    <rect x="698.1" y="1363.9" class="st8" width="8" height="180.9"/>
    <polygon class="st8" points="701.9,1579.2 682.1,1544.8 721.8,1544.8     "/>
</g>
<text transform="matrix(1 0 0 1 725.799 1051.3662)" class="st27 st28 st29">скидка 10%</text>
<text transform="matrix(1 0 0 1 728.0002 605.4132)" class="st27 st28 st29">скидка 10%</text>
<text transform="matrix(1 0 0 1 728.0004 1493.033)" class="st27 st28 st29">скидка 10%</text>
<text transform="matrix(1 0 0 1 631.3311 200.9131)" class="st25 st30 st31">ВЫ</text>
<text transform="matrix(1 0 0 1 607.0131 731.9185)" class="st25 st32 st33">Участник №1</text>
<text transform="matrix(1 0 0 1 606.8332 1171.9594)" class="st25 st32 st33">Участник №2</text>
<text transform="matrix(1 0 0 1 608.1306 1616.401)" class="st25 st32 st33">Участник №3</text>
</svg>

                    </div>
                    <div class="hidden-xs how-images col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                            <li>
                                <h2>
                                    ВЫ
                                </h2>
                                <img src="/ico/king.svg" class="king">
                            </li>
                            <li class="arrw">
                                <p>скидка 10%</p>
                                <img src="/ico/black-arrow.svg" class="black-arrow">
                            </li>
                            <li class="holp">
                                <p>Участник №1</p>
                                <img src="/ico/holop.svg" class="holop">
                            </li>
                            <li class="arrw">
                                <p>скидка 10%</p>
                                <img src="/ico/black-arrow.svg" class="black-arrow">
                            </li>
                            <li class="holp">
                                <p>Участник №2</p>
                                <img src="/ico/holop.svg" class="holop"> 
                           </li>
                            <li class="arrw">
                                <p>скидка 10%</p>
                                <img src="/ico/black-arrow.svg" class="black-arrow">
                            </li>
                            <li class="holp">
                                <p>Участник №3</p>
                                <img src="/ico/holop.svg" class="holop">
                            </li>
                        </ul>
                    </div>
                    <div class="carrows hidden-xs">
<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 20.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="crws" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 2000 2000" style="enable-background:new 0 0 2000 2000;" xml:space="preserve">
<style type="text/css">
    @font-face{
        font-family:'MuseoSansCyrl-500'; 
        src: url('/fonts/MuseoSansCyrl_500.eot');
        src: local('☺'), url('/fonts/MuseoSansCyrl_500.woff') format('woff'), url('/fonts/MuseoSansCyrl_500.ttf') format('truetype'), url('/fonts/MuseoSansCyrl_500.svg') format('svg');
    }
    .st0{fill:#FFFFFF;}
    .st1{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;}
    .st2{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.2629,12.2629;}
    .st3{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:10.8539,10.8539;}
    .st4{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:9.6667,9.6667;}
    .st5{fill:#FF8A18;}
    .st6{font-family:'MuseoSansCyrl_500';}
    .st7{font-size:27.1795px;}
    .st8{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;}
    .st9{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.6561,11.6561;}
    .st10{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:10.7703,10.7703;}
    .st11{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.9906,12.9906;}
    .st12{fill:#AAB3BB;}
    .st13{fill:#A9B2BA;}
    .st14{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.0266,12.0266;}
    .st15{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:10.7705,10.7705;}
    .st16{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.8655,11.8655;}
    .st17{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.6747,12.6747;}
    .st18{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:12.0075,12.0075;}
    .st19{fill:none;stroke:#FF8A18;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.5913,11.5913;}
    .st20{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.9225,11.9225;}
    .st21{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:11.4883,11.4883;}
    .st22{fill:none;stroke:#A9B2BA;stroke-width:2;stroke-miterlimit:10;stroke-dasharray:9.5802,9.5802;}
</style>
<g>
    <line class="st0" x1="302.3" y1="744.3" x2="768" y2="744.3"/>
    <g>
        <line class="st1" x1="302.3" y1="744.3" x2="308.3" y2="744.3"/>
        <line class="st2" x1="320.5" y1="744.3" x2="755.9" y2="744.3"/>
        <line class="st1" x1="762" y1="744.3" x2="768" y2="744.3"/>
    </g>
</g>
<g>
    <line class="st0" x1="767" y1="655.4" x2="767" y2="743.3"/>
    <g>
        <line class="st1" x1="767" y1="655.4" x2="767" y2="661.4"/>
        <line class="st3" x1="767" y1="672.2" x2="767" y2="731.9"/>
        <line class="st1" x1="767" y1="737.3" x2="767" y2="743.3"/>
    </g>
</g>
<g>
    <line class="st0" x1="302.3" y1="703.3" x2="302.3" y2="744.3"/>
    <g>
        <line class="st1" x1="302.3" y1="703.3" x2="302.3" y2="709.3"/>
        <line class="st4" x1="302.3" y1="719" x2="302.3" y2="733.5"/>
        <line class="st1" x1="302.3" y1="738.3" x2="302.3" y2="744.3"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 232.3149 675.8809)" class="st5 st6 st7">+ 1000 руб.</text>
<polygon class="st5" points="302.3,690.8 309.6,703.3 295.1,703.3 "/>
<g>
    <g>
        <line class="st8" x1="803" y1="743.8" x2="809" y2="743.8"/>
        <line class="st9" x1="820.7" y1="743.8" x2="1211.2" y2="743.8"/>
        <line class="st8" x1="1217" y1="743.8" x2="1223" y2="743.8"/>
    </g>
</g>
<g>
    <line class="st0" x1="1222" y1="655.7" x2="1222" y2="743.1"/>
    <g>
        <line class="st8" x1="1222" y1="655.7" x2="1222" y2="661.7"/>
        <line class="st10" x1="1222" y1="672.4" x2="1222" y2="731.7"/>
        <line class="st8" x1="1222" y1="737.1" x2="1222" y2="743.1"/>
    </g>
</g>
<g>
    <line class="st0" x1="803.8" y1="667.9" x2="803.8" y2="744.8"/>
    <g>
        <line class="st8" x1="803.8" y1="667.9" x2="803.8" y2="673.9"/>
        <line class="st11" x1="803.8" y1="686.9" x2="803.8" y2="732.3"/>
        <line class="st8" x1="803.8" y1="738.8" x2="803.8" y2="744.8"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 939.2953 726.8332)" class="st12 st6 st7">+ 1000 руб.</text>
<polygon class="st13" points="803.8,655.4 811,667.9 796.5,667.9 "/>
<g>
    <g>
        <line class="st8" x1="1279.1" y1="743.8" x2="1285.1" y2="743.8"/>
        <line class="st14" x1="1297.1" y1="743.8" x2="1675.9" y2="743.8"/>
        <line class="st8" x1="1681.9" y1="743.8" x2="1687.9" y2="743.8"/>
    </g>
</g>
<g>
    <line class="st0" x1="1686.9" y1="655.7" x2="1686.9" y2="743.1"/>
    <g>
        <line class="st8" x1="1686.9" y1="655.7" x2="1686.9" y2="661.7"/>
        <line class="st15" x1="1686.9" y1="672.4" x2="1686.9" y2="731.7"/>
        <line class="st8" x1="1686.9" y1="737.1" x2="1686.9" y2="743.1"/>
    </g>
</g>
<g>
    <line class="st0" x1="1278.8" y1="667.9" x2="1278.8" y2="744.8"/>
    <g>
        <line class="st8" x1="1278.8" y1="667.9" x2="1278.8" y2="673.9"/>
        <line class="st11" x1="1278.8" y1="686.9" x2="1278.8" y2="732.3"/>
        <line class="st8" x1="1278.8" y1="738.8" x2="1278.8" y2="744.8"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 1409.2378 726.8333)" class="st12 st6 st7">+ 1000 руб.</text>
<polygon class="st13" points="1278.8,655.7 1286,668.2 1271.5,668.2 "/>
<g>
    <line class="st0" x1="301.3" y1="857.8" x2="1250.7" y2="857.8"/>
    <g>
        <line class="st1" x1="301.3" y1="857.8" x2="307.3" y2="857.8"/>
        <line class="st16" x1="319.2" y1="857.8" x2="1238.7" y2="857.8"/>
        <line class="st1" x1="1244.7" y1="857.8" x2="1250.7" y2="857.8"/>
    </g>
</g>
<g>
    <line class="st0" x1="1249.7" y1="655.7" x2="1249.7" y2="857.8"/>
    <g>
        <line class="st1" x1="1249.7" y1="655.7" x2="1249.7" y2="661.7"/>
        <line class="st17" x1="1249.7" y1="674.3" x2="1249.7" y2="845.5"/>
        <line class="st1" x1="1249.7" y1="851.8" x2="1249.7" y2="857.8"/>
    </g>
</g>
<g>
    <line class="st0" x1="302.4" y1="817.4" x2="302.4" y2="858.4"/>
    <g>
        <line class="st1" x1="302.4" y1="817.4" x2="302.4" y2="823.4"/>
        <line class="st4" x1="302.4" y1="833" x2="302.4" y2="847.5"/>
        <line class="st1" x1="302.4" y1="852.4" x2="302.4" y2="858.4"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 239.3156 791.3032)" class="st5 st6 st7">+ 150 руб.</text>
<polygon class="st5" points="302.3,804.1 309.6,816.6 295.1,816.6 "/>
<g>
    <line class="st0" x1="302.1" y1="980.6" x2="1743" y2="980.6"/>
    <g>
        <line class="st1" x1="302.1" y1="980.6" x2="308.1" y2="980.6"/>
        <line class="st18" x1="320.1" y1="980.6" x2="1731" y2="980.6"/>
        <line class="st1" x1="1737" y1="980.6" x2="1743" y2="980.6"/>
    </g>
</g>
<g>
    <line class="st0" x1="1742" y1="655.7" x2="1742" y2="980.6"/>
    <g>
        <line class="st1" x1="1742" y1="655.7" x2="1742" y2="661.7"/>
        <line class="st19" x1="1742" y1="673.3" x2="1742" y2="968.8"/>
        <line class="st1" x1="1742" y1="974.6" x2="1742" y2="980.6"/>
    </g>
</g>
<g>
    <line class="st0" x1="303.2" y1="940.2" x2="303.2" y2="981.2"/>
    <g>
        <line class="st1" x1="303.2" y1="940.2" x2="303.2" y2="946.2"/>
        <line class="st4" x1="303.2" y1="955.9" x2="303.2" y2="970.4"/>
        <line class="st1" x1="303.2" y1="975.2" x2="303.2" y2="981.2"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 244.1217 914.1488)" class="st5 st6 st7">+ 100 руб.</text>
<polygon class="st5" points="303.1,926.9 310.4,939.5 295.9,939.5 "/>
<g>
    <g>
        <line class="st8" x1="784.5" y1="919.2" x2="790.5" y2="919.2"/>
        <line class="st20" x1="802.4" y1="919.2" x2="1702.6" y2="919.2"/>
        <line class="st8" x1="1708.5" y1="919.2" x2="1714.5" y2="919.2"/>
    </g>
</g>
<g>
    <line class="st0" x1="1714.5" y1="655.7" x2="1714.5" y2="908.9"/>
    <g>
        <line class="st8" x1="1714.5" y1="655.7" x2="1714.5" y2="661.7"/>
        <line class="st21" x1="1714.5" y1="673.2" x2="1714.5" y2="897.2"/>
        <line class="st8" x1="1714.5" y1="902.9" x2="1714.5" y2="908.9"/>
    </g>
</g>
<g>
    <line class="st0" x1="784.5" y1="879.5" x2="784.5" y2="920.2"/>
    <g>
        <line class="st8" x1="784.5" y1="879.5" x2="784.5" y2="885.5"/>
        <line class="st22" x1="784.5" y1="895" x2="784.5" y2="909.4"/>
        <line class="st8" x1="784.5" y1="914.2" x2="784.5" y2="920.2"/>
    </g>
</g>
<text transform="matrix(1 0 0 1 1189.0002 902.8356)" class="st12 st6 st7">+ 150 руб.</text>
<polygon class="st13" points="784.7,867 791.9,879.5 777.4,879.5 "/>
</svg>

                    </div>
                </div>
                <hr>
                <div class="bons-about-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_3">
                    <h2>О НАС</h2>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about-icon-content">
                        <div class="ab-ct col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <img src="/ico/sertificats.svg" class="about-icons">
                            <p>Мы строго соблюдаем<br>законодательство и требуем<br>этого от всех наших партнёров<br>и участников проекта.</p>
                        </div>
                        <div class="ab-ct col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <img src="/ico/garanty.svg" class="about-icons">
                            <p>
                                Мы используем <br class="visible-sm">SSL-сертификат<br class="visible-md"> для <br class="hidden-lg hidden-md">безопасности передачи<br> персональных данных<br>и защиты всех платежей
                            </p>
                        </div>
                        <div class="ab-ct col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <img src="/ico/payments.svg" class="about-icons">
                            <p>Мы принимаем платежи<br>и осуществляем выплаты только<br>через проверенных партнёров,<br>таких как Яндекс.</p>
                        </div>
                    </div>                    
                </div>
                <hr>
                <div class="bons-pay-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_4">
                    <h2>О ПЛАТЕЖНОМ <br class="visible-xs">СЕРВИСЕ ЯНДЕКС</h2>
                    <div class="pay_right visible-xs col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="mfc">
                            <img src="/ico/smartphone.png" class="smartphone">
                        </div>
                    </div>
                    <div class="pay_left col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <p>
                            Мы готовы доверять денежные вопросы только<br class="hidden-xs">надёжным партнёрам, при этом хотим<br class="hidden-xs">чтобы все выплаты были доступны для участников<br class="hidden-xs">как можно быстрее. <br class="hidden-xs">Поэтому используем удобные сервисы Яндекс.
                        </p>
                    </div>
                    <div class="pay_right hidden-xs col-sm-6 col-md-6 col-lg-6">
                        <div class="mfc">
                            <img src="/ico/smartphone.png" class="smartphone">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="bons-question-screen col-xs-12 col-sm-12 col-md-12 col-lg-12" id="bonus_5">
                    <h2>ВОПРОСЫ И ОТВЕТЫ</h2>
                    <div class="quest_left col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <ul>
                            <li style="line-height: 2.6vw;" class="two_lines">Lorem ispum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ispum dolor sit amet</li>
                            <li>Lorem ispum dolor sit amet</li>
                            <li>Lorem ispum dolor sit amet</li>
                            <li>Lorem ispum dolor sit amet</li>
                        </ul>
                    </div>
                    <div class="quest_right col-xs-12 col-sm-7 col-md-7 col-lg-7">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus iaculis tellus, id feugiat purus pharetra vitae. Nulla facilisi. Sed at condimentum augue, at interdum leo. Maecenas eu interdum ipsum, id aliquam nibh. Nam molestie velit et turpis rutrum, quis rutrum leo accumsan. Vivamus nec laoreet enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec justo rutrum, vehicula magna in, tempus metus.</p>
                    </div>
                    <p class="qwston">?</p>
                </div>
                <div class="connect-screen col-lg-12 col-md-12 col-sm-12 col-xs-12" id="section_8">
                    <div  class="connect_screen_shader">
                        <p>REFORMATOR</p>
                    </div>
                    <div class="connect_content">
                        <p class="connect">ПРИСОЕДИНИТЬСЯ!</p>
                        <p class="connect_info">ПОЛУЧИТЬ ДОСТУП К ПЛАТФОРМЕ REFORMATOR.ONE <br>В ТЕЧЕНИЕ ТЕСТОВОГО ПЕРИОДА СОВЕРШЕННО БЕСПЛАТНО</p>
                        <p class="connect_price">2500 руб. <b>0 руб.</b></p>
                        <button class="connect_btn" type="button" data-toggle="modal" data-target="#registr">ПОПРОБОВАТЬ БЕСПЛАТНО</button>
                    </div>                
                </div>
                <footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mission">
                        <img src="/ico/footer_logo.png" alt="">
                        <p>наша миссия<br>
                        в повышении качества жизни<br>
                        общества через вовлечение<br>
                        широкого круга населения<br>
                        в любительский спорт и зож</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 prgrm_list">
                        <ul>
                            <li><a href="#">R.ONE START</a></li>
                            <li><a href="#">R.ONE PRO</a></li>
                            <li><a href="#">R.ONE RUNNER</a></li>
                            <li><a href="#">R.ONE RUNNER +</a></li>
                            <li><a href="#">R.ONE POWER</a></li>
                            <li class="bonus"><a href="#" >БОНУСНАЯ<br>
                             ПРОГРАММА</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 reg_f_s">
                        <ul>
                            <li>
                                <a href="">РЕГИСТРАЦИЯ</a>
                            </li>
                            <li class="accsss">
                                <a href="">ПОЛУЧИТЬ ДОСТУП<br>К БЕСПЛАТНОМУ КУРСУ</a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/ico/fb.png" alt="">
                                </a>
                                <a href="#">
                                    <img src="/ico/vk.png" alt="">
                                </a>
                                <a href="#">
                                    <img src="/ico/inst.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ofrta">
                        <ul>
                            <li>
                                <a href="#">ДОГОВОР ОФЕРТА</a>
                            </li>
                            <li id="pltks">
                                <a href="#">ПОЛИТИКА<br>КОНФЕДИЦИАЛЬНОСТИ</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    @include('home.registration',['user' => $user, 'referral' => $referral])
    @include('home.login')
@overwrite
