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
	<div class="container-fluid" style="background: #282828; padding: 40px; text-align: center;">
		<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 25%;">
	</div>
	<div class="container" style="padding: 60px; min-height: 300px; margin-bottom: 60px; background: url('{{env("APP_URL")."/image/mail/back_logo.png"}}') no-repeat; background-size: contain;background-position: bottom;">
		<h1 style="color: #da8836; font-size: 30px; margin-bottom: 70px;">СПАСИБО ЗА РЕГИСТРАЦИЮ</h1>
		<p style="font-size: 20px; margin: 40px 0px;">Спасибо за регистрацию в системе Reformator.One</p>

		<p style="font-size: 20px; margin: 40px 0px;">Ваш пароль в системе: <b>{{$password}}</b></p>
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