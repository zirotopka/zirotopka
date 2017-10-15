<div class="user-data-content">
	<p id="myself_info">ИНФОРМАЦИЯ О СЕБЕ</p>
	<a href=""><img src=/ico/edit.png class="edit_btn" alt="Изменить профиль"></a>
	<div class="row">
		<div class="pd ctn col-lg-5 col-md-5 col-sm-6 col-xs-6">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="ltt orange-text">Фамилия</p>
				<p class="gray-text">{{($user->surname)}}</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="ltt orange-text">Имя</p>
				<p class="gray-text">{{($user->first_name)}}</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="ltt orange-text">Город</p>
				<p class="gray-text">{{($user->city)}}</p>
			</div>
		</div>
		<div class="pd col-lg-7 col-md-7 col-sm-6 col-xs-6">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="rtt orange-text">Номер телефона</p>
				<p class="gray-text">{{!empty($user->phone) ? $user->phone : ''}}</p>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="rtt orange-text">Дата рождения</p>
				<p class="gray-text">{{ !empty($user->birthday) ? DateTime::createFromFormat('Y-m-d H:i:s', $user->birthday)->format('Y-m-d') : '' }}</p>
			</div>
			<div class="hw col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="lwh col-lg-3 col-md-4 col-sm-5 col-xs-6">
					<p class="orange-text">Рост</p>
					<p class="gray-text">{{$user->growth}} см.</p>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
					<hr>
				</div>
				<div class="rwh col-lg-8 col-md-7 col-sm-5 col-xs-6">
					<p class="orange-text">Вес</p>
					<p class="gray-text">{{$user->weight}} кг.</p>
				</div>
			</div>
		</div>
		<hr class="orngln col-lg-10 col-md-10 col-sm-10 col-xs-10">
		<div class="pd mb-cct col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p class="gray-text yad">WebMoney - кошелек</p>
			<p class="orange-text">{{!empty($user->wallet) ? $user->wallet : 'Здесь будет WebMoney - кошелек'}}</p>
		</div>
		<hr class="orngln col-lg-10 col-md-10 col-sm-10 col-xs-10">
		<div class="pd mb-cct col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p class="rf ctt gray-text">Реферальная ссылка</p>
			<p class="orange-text">{{!empty($user->slug) ? env('APP_URL').'/ref/'.$user->slug : 'Здесь будет реферальная ссылка'}}</p>
			<p class="gray-lit-text">Если Вы хотите зарабатывать, то поделитесь этой ссылкой<br class="hidden-xs"> с друзьями. При регистрации они должны указать эту ссылку. </p>
		</div>
	</div>
</div>