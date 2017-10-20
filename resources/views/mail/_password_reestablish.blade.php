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
		$url = env('APP_URL').'/get_password/'.$user->id.'?code='.$code;
	?>
	<header class="container-fluid" style="background-color: #282828; padding: 40px; text-align: center;">
		<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 25%;">
	</header>
	<div class="container" style="padding: 60px; min-height: 300px; margin-bottom: 60px; background: url('{{env("APP_URL")."/image/mail/back_logo.png"}}') no-repeat; background-size: contain;background-position: bottom;">
		<h1 style="color: #da8836; font-size: 30px; margin-bottom: 70px;">ВОССТАНОВЛЕНИЕ ПАРОЛЯ</h1>
		<p style="font-size: 20px; margin: 40px 0px;">Уважаемый(-ая) {{$user->first_name}} {{$user->surname}} (Reformator).</p>

		<p style="font-size: 20px; margin: 40px 0px;">Нами был получен запрос на сброс вышего пароля. Для отмены запроса достаточно просто проигнорировать это письмо. Запрос утратит силу через 2 дня.</p>

		<p style="font-size: 20px; margin: 40px 0px;">Для сброса пароля, перейдите, пожалуйста, по следующей ссылке:</p>

		<a href="{{$url}}"><b>Сброс пароля</b></a>

		<p style="font-size: 20px; margin: 40px 0px;">После перехода по ссылке, вы сможете ввести новый пароль.</p>
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