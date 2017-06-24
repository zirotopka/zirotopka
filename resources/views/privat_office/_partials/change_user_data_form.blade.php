<form action="{{'/lk/'.$user->id.'/'}}" method="POST" class="show-hidden-form">
    {{ csrf_field() }}
	<div class="row">
		<div class="col-lg-4 lft-info">
			<p id="myself_info">ИНФОРМАЦИЯ О СЕБЕ</p>
			<a href=""> <img src=/ico/edit.png class="edit_btn" alt="Изменить профиль"></a>
			<p class="p_marg">Номер телефона</p>
			<input type="text" name="phone" class="phone-inp edit-inputs">
			<p class="p_marg">Дата рождения</p>
			<input type="text" name="day" class="col-lg-4 birthdate-left edit-inputs" placeholder="дд">
			<input type="text" name="month" class="col-lg-4 birthdate-center edit-inputs" placeholder="мм">
			<input type="text" name="year" class="col-lg-4 birthdate-right edit-inputs" placeholder="гггг">
			<div class="row">	
				<div class="col-lg-6" style="padding: 0;">
					<p class="p_marg">Рост</p>
					<input type="text" name="growth" class="edit-inputs hw-cls">
					<p class="mera">см.</p>
				</div>
				<div class="col-lg-6 wght-cls">
					<p class="p_marg">Вес</p>
					<input type="text" name="weight" class="edit-inputs hw-cls ">
					<p class="mera">кг.</p>
				</div>
			</div>
			<input type="submit" class="save-btn" title="СОХРАНИТЬ" value="СОХРАНИТЬ">
		</div>			
		<div class="row col-lg-8 rt-info">
			<div class="pasport">
				<p>Паспортные данные</p>
				<input type="text" name="pasport_name" class="edit-inputs pasp_id col-lg-12" placeholder="ФИО">
				<input type="text" name="pasport_number" class="edit-inputs pasp_numb col-lg-2" placeholder="№">
				<input type="text" name="pasport_series" class="edit-inputs pasp_series col-lg-4" placeholder="серия">
				<input type="text" name="pasport_date" class="edit-inputs pasp_date col-lg-6" placeholder="дата выдачи">
				<textarea type="text" name="pasport_issued" class="edit-inputs pasp_who col-lg-12" placeholder="кем выдан"></textarea>
			</div>
		</div>
	</div>
</form>
