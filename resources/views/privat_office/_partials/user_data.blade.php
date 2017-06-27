<div class="user-data-content">
	<p id="myself_info">ИНФОРМАЦИЯ О СЕБЕ</p>
	<img src=/ico/edit.png class="edit_btn" alt="Изменить профиль">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
			<p class="orange-text">Номер телефона</p>
			<p class="gray-text">{{$user->phone}}</p>
			<p class="orange-text">Дата рождения</p>
			<p class="gray-text">{{ !empty($user->birthday) ? DateTime::createFromFormat('Y-m-d H:i:s', $user->birthday)->format('Y-m-d') : '' }}</p>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style="padding: 0;">
				<p class="orange-text">Рост</p>
				<p class="gray-text">{{$user->growth}} см.</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
				<p class="orange-text">Вес</p>
				<p class="gray-text">{{$user->weight}} кг.</p>
			</div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
			<p class="orange-text">Город проживания</p>
			<p class="gray-text">{{$user->city}}</p>
			<p class="orange-text">Паспортные данные</p>
			<p class="gray-text">{{$user->pasport_name}}</p>
			<p class="gray-text">{{$user->pasport_number.' '.$user->pasport_series.' '.!empty($user->pasport_date) ?  gmdate("Y-m-d", $user->pasport_date) : '' }}</p>
			<p class="gray-text">{{$user->pasport_issued}}</p>
		</div>
	</div>
</div>