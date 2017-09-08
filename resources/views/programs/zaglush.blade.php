@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/programs/zaglush.css" type="text/css" rel="stylesheet">
    <link href="/assets/programs/programs.css" type="text/css" rel="stylesheet">
        @if ($slug == "r.one_pro")
            <link href="/assets/programs/pro.css" type="text/css" rel="stylesheet">
        @elseif ($slug == "r.one_runner")
            <link href="/assets/programs/run.css" type="text/css" rel="stylesheet">
        @elseif ($slug == "r.one_runner_plus")
            <link href="/assets/programs/runp.css" type="text/css" rel="stylesheet">
        @elseif ($slug == "r.one_power")
            <link href="/assets/programs/pow.css" type="text/css" rel="stylesheet">
        @endif

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут -->
@overwrite
@section("content")
    <div class="container-fluid" >
	    @include('home.fixed-menu')
        <div class="hidden-xs hidden-sm col-md-2 col-lg-2"></div>   
        <div class="home_content col-lg-10 col-md-10 col-sm-12 col-xs-12">
        @if ($user = Sentinel::check())
          @php
              $class = '';
              $class = 'rg_check_in';
          @endphp
            <div class="{{$class}} rstart-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zagl col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2>ПРОГРАММА НА СТАДИИ РАЗРАБОТКИ</h2>
                    <p class="razrb">Разработка программы в завершающей стадии,<br>а пока предлагаю попробовать свои силы в:</p>
                    <div style="width: 16vw; margin: 0 auto;">
                        <a href="/programm/r.one_start">
                            <h2>R.ONE START</h2>
                            <p class="known">узнать подробнее</p>
                        </a>
                    </div>
                </div>
            </div>

        @else
            <div id="st-trigger-effects" class="hidden-md hidden-lg">
                <button data-effect="st-effect-2" class="cdr-btn">
                    <img src="/ico/menu.svg" alt="" style="width: 3.5vw;">
                </button>
            </div>
            <div class="rstart-screen col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zagl col-xs-12 col-sm-12 col-md-12 col-lg-12">
                	<h2>ПРОГРАММА НА СТАДИИ РАЗРАБОТКИ</h2>
                	<p class="razrb">Разработка программы в завершающей стадии,<br>а пока предлагаю попробовать свои силы в:</p>
	                <div style="width: 16vw; margin: 0 auto;">
                        <a href="/programm/r.one_start">
    	                	<h2>R.ONE START</h2>
    	                	<p class="known">узнать подробнее</p>
                    	</a>
                    </div>
                </div>
            </div>
            
        @endif
		</div>
	</div>
@overwrite
