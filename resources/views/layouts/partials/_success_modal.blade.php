<div class="modal fade" id="success_form" tabindex="-1" role="dialog" aria-labelledby="success_form" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog freezing-widnow" role="document">
    <div class="modal-content">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">{{$data['caption']}}</h4>
          </div>
          <div class="modal-body">
            {{$data['text']}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Закрыть</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>