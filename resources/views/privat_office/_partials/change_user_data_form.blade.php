<div class="user-data-ctn">
	<form action="{{'/lk/'.$user->id.'/'}}" method="POST" class="show-hidden-form">
	    {{ csrf_field() }}
		<p id="myself_info">ИНФОРМАЦИЯ О СЕБЕ</p>
		<a href=""> <img src=/ico/edit.png class="edit_btn" alt="Изменить профиль"></a>
		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 lft-info">
				<div>
					<p>Фамилия</p>
					<input type="text" name="surname" class="edit-inputs" value="{{$user->surname}}">
				</div>
				<div>
					<p>Имя</p>
					<input type="text" name="name" class="edit-inputs" value="{{$user->first_name}}">
				</div>
				<div>
					<p>Город</p>
					<input type="text" name="city" class="edit-inputs" value="{{$user->city}}">
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 rt-info">
				<div class="mbbg">
					<p>Телефон</p>
					<input type="tel" name="phone" class="phone-inp edit-inputs" placeholder="+_(___)___-__-__" value="{{!empty($user->phone) ? $user->phone : ''}}">
				</div>
				<div class="pd mb-cct npd col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p class="bdd">Дата рождения</p>
					<select name="day" id="days" class="dss"></select>
					<select name="month" id="months" class="birthday"></select>
					<select name="year" id="years" class="birthday"></select>
				</div>
				<div class="pd mb-cct npd col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
						<p class="qw col-lg-3 col-md-3 col-sm-3 col-xs-3">Рост</p>
						<input type="text" name="growth" class="edit-inputs hw-cls col-lg-3 col-md-3 col-sm-3 col-xs-3" value="{{$user->growth}}">
						<p class="qw sg col-lg-3 col-md-3 col-sm-3 col-xs-3">см.</p>
					</div>
					<hr class="wh-line col-lg-1 col-md-1 col-sm-1 hidden-xs">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<p class="qw wq col-lg-1 col-md-1 col-sm-1 col-xs-1">Вес</p>
						<input type="text" name="weight" class="edit-inputs hw-cls col-lg-3 col-md-3 col-sm-3 col-xs-3" value="{{$user->weight}}">
						<p class="qw sg col-lg-3 col-md-3 col-sm-3 col-xs-3">кг.</p>
					</div>
				</div>
			</div>
			<hr class="orngln col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0.7em 0 0 0;">
				<p class="gray-text yad">Яндекс - кошелек</p>
				<input class="edit-inputs inp-yadik" type="text" value="{{$user->wallet}}">
				<p class="gray-text yad or">или</p>
				<button type="button" class="yadik">ЗАВЕСТИ КОШЕЛЕК</button>
			</div>
			<hr class="orngln col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="pd mb-cct col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="rf ctt gray-text">Реферальная ссылка</p>
				<p class="orange-text">{{!empty($user->referer_code) ? $user->referer_code : 'Здесь будет реферальная ссылка'}}</p>
				<p class="gray-lit-text txt-con">Если Вы хотите зарабатывать, то поделитесь этой ссылкой<br class="hidden-xs"> с друзьями. При регистрации они должны указать эту ссылку. </p>
			</div>
			<hr class="orngln col-lg-10 col-md-10 col-sm-10 col-xs-10">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<input type="submit" class="save-btn" title="СОХРАНИТЬ" value="СОХРАНИТЬ">
			</div>
			
		</div>
	</form>
</div>
