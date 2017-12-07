<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Рассылка Reformator.One</title>

	<style>
		h1, p {
			font-family: Gilroy;
		}
	</style>
</head>
<body>
	<?php
		$url = env('APP_URL').'/'.$user->slug;
	?>
	<header class="container-fluid" style="background-color: #282828; padding: 40px; text-align: center;">
		<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 25%;">
	</header>
	<div class="container" style="padding: 60px; min-height: 300px; margin-bottom: 60px; background: url('{{env("APP_URL")."/image/mail/back_logo.png"}}') no-repeat; background-size: contain;background-position: bottom;">
		<h1 style="color: #da8836; font-size: 30px; margin-bottom: 70px;">Дорогой пользователь платформы <a href="https://reformator.one/">reformator.one</a></h1>
		<p style="font-size: 20px; margin: 40px 0px;">Сегодня, 28 ноября 2017 года мы объявляем о старте платформы!
Каждому участнику мы дарим 500 реформани (курс к рублю 1 к 1) и 5 иммунитетов (они нужны, если Вы пропустите обязательную тренировку)!</p>

		<p style="font-size: 20px; margin: 40px 0px;">Если Вы еще не активировали свой аккаунт - обязательно сделайте это!</p>

		<p style="font-size: 20px; margin: 40px 0px;">Напоминаем, что Вы можете приглашать своих друзей по ссылке в личном кабинете и получать за это выплаты!</p>

		<p style="font-size: 20px; margin: 40px 0px;">Удачи в проекте!<b/>С любовью, команда <a href="https://reformator.one/">reformator.one</a></p>
	</div>
	<footer class="container-fluid" style="background-color: #282828; padding: 40px">
		<div class="container">
			<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
				<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt=""   style="width: 15%;">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
		</div>
	</footer>
</body>
</html>