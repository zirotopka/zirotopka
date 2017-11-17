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
    <script type="text/javascript" src="/assets/privat_account/faq.js"></script>    

@overwrite


@section("content")
	@include('layouts.office_left_menu')
	
<div class="right_edit_part col-xs-12 col-sm-12 col-lg-10 col-md-10">
	@include('FAQ.faq_pages.faq_access')
	@include('FAQ.faq_pages.faq_programm')
	@include('FAQ.faq_pages.faq_immunity')
	@include('FAQ.faq_pages.faq_questions')
	<div class="FAQ">
		<p class="faq_help">ПОМОЩЬ</p>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="access_block" id="oref">
					<div class="title_block">
						<img src="/ico/faq_key.png" alt="" class="faq_ico">					
						<p class="faq_title">ВОПРОСЫ О REFORMATOR.ONE</p>
					</div>
					<div class="questions_block">
						<ul>
							<li>
								<a href="#" class="qww1">Подробнее о проекте</a>
							</li>
							<li>
								<a href="#" class="qww2">Основная идея проекта</a>
							</li>
							<li>
								<a href="#" class="qww3">Как стать участником бонусной программы</a>
							</li>
							<li class="hidden" class="qww4">
								<a href="#">Для кого проект?</a>
							</li>
							<li>
								<a href="#" class="faq_show_all show_access">Показать всё</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="programm_block" id="oprg">
					<div class="title_block">
						<img src="/ico/faq_bottle.png" alt="" class="faq_ico">					
						<p class="faq_title">ВОПРОСЫ О ПРОГРАММАХ ТРЕНИРОВОК</p>
					</div>
					<div class="questions_block">
						<ul>
							<li>
								<a href="#" class="qww1">Сколько длится программа тренировок?</a>
							</li>
							<li>
								<a href="#" class="qww2">Будут ли выходные дни?</a>
							</li>
							<li>
								<a href="#" class="qww3">Какие виду упражнений предусматриваются впрограммах?</a>
							</li>
							<li class="hidden" >
								<a href="#">Если я давно не занимался спортом, смогу ли я "осилить" программу?</a>
							</li>
							<li class="hidden">
								<a href="#">Кто будет проверять отчёты по выполнению?</a>
							</li>
							<li class="hidden">
								<a href="#">Есть ли возрастные ограничения для участия в проекте?</a>
							</li>
							<li class="hidden">
								<a href="#">Будут ли рекомендации по питанию?</a>
							</li>
							<li>
								<a href="#" class="faq_show_all show_progr">Показать всё</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="programm_block" id="oprv">
					<div class="title_block">
						<img src="/ico/coin.png" alt="" class="faq_ico">					
						<p class="faq_title">ПРАВИЛА УЧАСТИЯ В ПРОЕКТЕ</p>
					</div>
					<div class="questions_block">
						<ul>
							<li>
								<a href="#" class="qww1">Как принять участие в проекте и что для этого нужно?</a>
							</li>
							<li>
								<a href="#" class="qww2">Что такое личный кабинет участника?</a>
							</li>
							<li>
								<a href="#" class="qww3">Что нужно делать, чтоб остаться в проекте?</a>
							</li>
							<li class="hidden">
								<a href="#">Что такое обязательные и необязательные дни тренировок?</a>
							</li>
							<li class="hidden">
								<a href="#">Что такое иммунитет в проекте?</a>
							</li>
							<li class="hidden">
								<a href="#">Для чего необходимо оставаться в проекте?</a>
							</li>
							<li class="hidden">
								<a href="#">В каких случаях личныйй кабинет участника может быть заблокирован?</a>
							</li>
							<li class="hidden">
								<a href="#">Сколько обязательных дней можно пропустить?</a>
							</li>
							<li>
								<a href="#" class="faq_show_all show_ruls">Показать всё</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="programm_block" id="ovsm">
					<div class="title_block">
						<img src="/ico/faq_star.png" alt="" class="faq_ico">
						<p class="faq_title">РАЗНЫЕ ВОПРОСЫ</p>
					</div>
					<div class="questions_block">
						<ul>
							<li>
								<a href="#" class="qww1">Возможно ли попробовать принять участие в проекте без оплаты?</a>
							</li>
							<li>
								<a href="#" class="qww3">Что делать после завершения(прохождения) программы тренировок?</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="callback col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="calb_text">Если Вы не нашли ответ на свой вопрос, <a href="/messages/new">напишите нам!</a> </p>
			</div>
		</div>
	</div>
</div>
@overwrite





