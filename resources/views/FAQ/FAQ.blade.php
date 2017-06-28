@extends('layouts.main')

@section('css')
    @parent
    <!-- Добавлять css тут -->
    <link href="/assets/privat_account/faq.css" type="text/css" rel="stylesheet">
    <link href="/assets/privat_account/sidebar.css" type="text/css" rel="stylesheet">

@overwrite

@section('js')
    @parent
    <!-- Добавлять js тут --> 
    <script type="text/javascript" src="/assets/privat_account/lk_balance.js"></script>    

@overwrite


@section("content")
	@include('layouts.office_left_menu')
	<!--Balance content-->
	<div class="right_edit_part col-xs-8 col-sm-8 col-lg-10 col-md-10">

<div class="FAQ">
	<p class="faq_help">ПОМОЩЬ</p>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="access_block">
				<div class="title_block">
					<img src="/ico/faq_key.png" alt="" class="faq_ico">					
					<p class="faq_title">ДОСТУП К ЛИЧНОМУ КАБИНЕТУ</p>
				</div>
				<div class="questions_block">
					<ul>
						<li>
							<a href="">Не могу зайти в личный кабинет!</a>
						</li>
						<li>
							<a href="">Как удалить личный кабинет</a>
						</li>
						<li>
							<a href="">Как изменить пароль</a>
						</li>
						<li>
							<a href="" class="faq_show_all">Показать всё</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="programm_block">
				<div class="title_block">
					<img src="/ico/faq_bottle.png" alt="" class="faq_ico">					
					<p class="faq_title">ВОПРОСЫ ПО КУРСУ</p>
				</div>
				<div class="questions_block">
					<ul>
						<li>
							<a href="">Программа мне не подходит, можно ли изменить?</a>
						</li>
						<li>
							<a href="">У меня есть вопросы по упражнениям</a>
						</li>
						<li>
							<a href="">Не могу загрузить отчёт</a>
						</li>
						<li>
							<a href="" class="faq_show_all">Показать всё</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="immunity_block">
				<div class="title_block">
					<img src="/ico/faq_heart.png" alt="" class="faq_ico">	
					<p class="faq_title">ВОПРОСЫ ПРО ИММУНИТЕТ</p>				
				</div>
				<div class="questions_block">
					<ul>
						<li>
							<a href="">Что такое иммунитет?</a>
						</li>
						<li>
							<a href="">Как работает иммунитет?</a>
						</li>
						<li>
							<a href="">Как купить иммунитет?</a>
						</li>
						<li>
							<a href="" class="faq_show_all">Показать всё</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="questions_block">
				<div class="title_block">
					<img src="/ico/faq_star.png" alt="" class="faq_ico">
					<p class="faq_title">ОБЩИЕ ВОПРОСЫ</p>
				</div>
				<div class="questions_block">
					<ul>
						<li>
							<a href="">Как участвовать в розыгрыше призов?</a>
						</li>
						<li>
							<a href="">Как работает бонусная система?</a>
						</li>
						<li>
							<a href="">Как изменить информацию о себе?</a>
						</li>
						<li>
							<a href="" class="faq_show_all">Показать всё</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@overwrite





