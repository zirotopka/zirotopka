<div class="modal fade" id="pay-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="orang-txt test">ЗАВЕРШЕНИЕ ТЕСТОВОГО ПЕРИОДА</p>        
                <p class="gray-text">К сожалению, Ваш тестовый период закончился. <br>Чтобы продолжить участие, необходимо активировать программу</p>
                <p class="orang-txt price">
                    2500 <img src="/ref.svg">
                </p>
                <form action="{{env('APP_URL').'/privat_office/payProduct/1'}}" method="POST" class="form-horizontal">
					<input name="user_id" type="hidden" value="{{$user->id}}">
					{{ csrf_field() }}

                    <div class="form-group">
                        <div>
                          <input type="submit" value="АКТИВИРОВАТЬ" class="link"/>
                        </div>
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>