<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Активация</title>

	<style>
		h1, p {
			font-family: Gilroy;
		}
	</style>
</head>
<body>
	<?php
		$url = 'https://t.me/reformatorone';
	?>
	<div class="container-fluid" style="background: #282828; padding: 40px; text-align: center;">
		<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 25%;">
	</div>
	<div class="container" style="padding: 60px; min-height: 300px; margin-bottom: 60px; background: url('{{env("APP_URL")."/image/mail/back_logo.png"}}') no-repeat; background-size: contain;background-position: bottom;">
		<h1 style="color: #da8836; font-size: 30px; margin-bottom: 70px;">Скорее присоединяйся в наш Telegram</h1>
		<p style="font-size: 20px; margin: 40px 0px;">Уважаемый(-ая) {{$user->first_name}} {{$user->surname}} (Reformator).</p>

		<p style="font-size: 20px; margin: 40px 0px;">Подпишись обязательно на наш официальный канал в Telegram - мы там будем давать разъяснения и другую полезную информацию! </p>

		<p style="font-size: 20px; margin: 40px 0px;">Просто перейди по ссылке: </p>

		<a href="{{$url}}"><b>Reformator Telegram</b></a>

		<p style="font-size: 20px; margin: 40px 0px;">Мы также очень благодарны тебе за то, что в числе первых с нами! И поэтому подарили 500 ReforMoney на твой счет в личном кабинете (проверь обязательно).</p>

		<p style="font-size: 20px; margin: 40px 0px;">С уважением и любовью,</br>команда Reformator.One</p>
	</div>
	<div class="container-fluid" style="background: #282828; padding: 40px">
		<div class="container">
			<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
				<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt=""   style="width: 15%;">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
		</div>
	</div>
</body>
</html>