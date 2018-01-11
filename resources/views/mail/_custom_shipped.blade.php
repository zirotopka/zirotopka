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
	<header class="container-fluid" style="background-color: #282828; padding: 40px; text-align: center;">
		<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 25%;">
	</header>
	<div class="container" style="padding: 60px; min-height: 300px; margin-bottom: 60px; background: url('{{env("APP_URL")."/image/mail/back_logo.png"}}') no-repeat; background-size: contain;background-position: bottom;">
		<h1 style="color: #da8836; font-size: 30px; margin-bottom: 70px;">Рассылка Reformator.One</h1>
		<p style="font-size: 20px; margin: 20px 0px;">Уважаемый(-ая) {{$user->first_name}} {{$user->surname}} (Reformator).</p>
		<p style="font-size: 20px; margin: 20px 0px;">
			В прошлом году многие жаловались на некоторые технические проблемы в работе платформы, а также многим не нравилось отправлять видео-отчеты по выполнению заданий.
		</p>
		<p style="font-size: 20px; margin: 20px 0px;">
			Мы пошли Вам на встречу и специально подготовили программу R.ONE Lite, которая является облегченной версией и которая не требует отчетности в виде видео-файлов или принтскрина экранов!
		</p>
		<p style="font-size: 20px; margin: 20px 0px;">
			Но самое главное мы сохранили! Это возможность заработать деньги с нашей простой и понятной бонусной системой.
		</p>
		<p style="font-size: 20px; margin: 20px 0px;">
			Мы обновили аккаунты, чтобы ты мог попробовать новую программу (без отчетов).
			Как всегда, пробный период - бесплатно!
			А теперь ВНИМАНИЕ - приятный бонус для тебя -  500 ReforMoney (то есть, 500 рублей) на счете, которые ты сможешь приумножить и в любой момент вывести на свой кошелек!
		</p>
		<p style="font-size: 20px; margin: 20px 0px;">
			Присоединяйся уже сейчас!
			<a href="https://reformator.one/">www.reformator.one</a>
		</p>
	</div>
	<footer class="container-fluid" style="background-color: #282828; padding: 40px">
		<div class="container">
			<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
				<img src='{{env("APP_URL")."/image/mail/logo.png"}}' alt="" style="width: 15%;">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
		</div>
	</footer>
</body>
</html>