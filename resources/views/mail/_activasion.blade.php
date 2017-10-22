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
		$url = env('APP_URL').'/activasion/'.$user->id.'?password='.$password.'&code='.$code;
	?>
	<header class="container-fluid" style="background-color: #282828; padding: 40px; text-align: center;">
		<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 25%;">
	</header>
	<div class="container" style="padding: 60px; min-height: 300px; margin-bottom: 60px; background: url('{{env("APP_URL")."/image/mail/back_logo.png"}}') no-repeat; background-size: contain;background-position: bottom;">
		<h1 style="color: #da8836; font-size: 30px; margin-bottom: 70px;">АКТИВАЦИЯ АККАУНТА</h1>
		<p style="font-size: 20px; margin: 40px 0px;">Пожалуйста, подтвердите Ваш электронный адрес, <a href="{{$url}}"><b>нажмите сюда.</b></a></p>

		<p style="font-size: 20px; margin: 40px 0px;">Если у вас возникнут сложности с подтверждением, напишите сюда: <b>support@reformator.one</b></p>

		<a href="{{$url}}" style="text-decoration: none; border-radius: 30px;color: white;font-size: 22px;margin: 40px 0px;background-color: #da8836;display: inline-block;padding: 20px;">АКТИВИРОВАТЬ</a>
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