<form action="{{'/lk/'.$user->id.'/'}}" method="POST" class="show-hidden-form">
    {{ csrf_field() }}
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 lft-info">
			<p id="myself_info">ИНФОРМАЦИЯ О СЕБЕ</p>
			<a href=""> <img src=/ico/edit.png class="edit_btn" alt="Изменить профиль"></a>
			<p class="p_marg">Номер телефона</p>

			<input type="text" name="phone" class="phone-inp edit-inputs">
			<div style="height: 4em;" class="row mrg">	
				<p class="p_marg">Дата рождения</p>
				<div class="bstd">
					<input type="text" name="day" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 birthdate-left edit-inputs" placeholder="дд">
					<input type="text" name="month" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 birthdate-center edit-inputs" placeholder="мм">
					<input type="text" name="year" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 birthdate-right edit-inputs" placeholder="гггг">
				</div>
			</div>
			<div class="row rac">
					<p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 rgt">Рост</p>
					<input type="text" name="growth" class="edit-inputs hw-cls col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<p class="col-lg-6 col-md-6 col-sm-4 col-xs-4 lft">см.</p>
			</div>	
			<div class="row">
					<p class="col-lg-2 col-md-2 col-sm-4 col-xs-4 rgt">Вес</p>
					<input type="text" name="weight" class="edit-inputs hw-cls col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<p class="col-lg-6 col-md-6 col-sm-4 col-xs-4 lft">кг.</p>
			</div>	
			
		</div>			
		<div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12 rt-info">
			<div class="city col-xs-12 col-sm-12">
				<p>Город проживания</p>
				<input type="text" name="city" class="edit-inputs">
			</div>
			<div class="pasport col-xs-12 col-sm-12">
				<p>Паспортные данные</p>
				<input type="text" name="pasport_name" class="edit-inputs pasp_id col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="ФИО">
				<input type="text" name="pasport_number" class="edit-inputs pasp_numb col-lg-2 col-md-2 col-sm-2 col-xs-2" placeholder="№">
				<input type="text" name="pasport_series" class="edit-inputs pasp_series col-lg-4 col-md-4 col-sm-4 col-xs-4" placeholder="серия">
				<input type="date" name="pasport_date" class="edit-inputs pasp_date col-lg-6 col-md-6 col-sm-6 col-xs-6" placeholder="дата выдачи">
				<textarea type="text" name="pasport_issued" class="edit-inputs pasp_who col-lg-12 col-md-12 col-sm-12 col-xs-12" placeholder="кем выдан"></textarea>
			</div>
		</div>
		<input type="submit" class="save-btn" title="СОХРАНИТЬ" value="СОХРАНИТЬ">
	</div>
</form>
