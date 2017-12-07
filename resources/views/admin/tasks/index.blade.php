@extends('admin.layouts.main')

@section('css')
    @parent
    <link rel="stylesheet" href="/assets/admin/accruals.css">
    <link href="http://vjs.zencdn.net/6.2.5/video-js.css" rel="stylesheet">
    <link href="/assets/privat_account/account.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/video-btn.css">
@overwrite

@section('js')
    @parent
<!--     <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
    <script type="text/javascript" src="/assets/admin/video.js"></script>
    <script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
@overwrite

@section("content")
    <div class="row">
        @if(count($trainings) == 0)
            <div class="alert alert-warning">
                Задания отсутствуют
            </div>
        @else
            <table class="table table-striped" id="users-table">
                <thead>
                <th>Пользователь</th>
                <th>День тренировки</th>
                <th>Дата загрузки</th>
                <th>Дата дедлайна</th>
                <th>Файлы</th>
                <th>Действия</th>
                </thead>
                <tbody>
                @foreach($trainings as $training)
                    <?php
                        $stages = $training->stages;
                        $user = $training->user;
                    ?>
                    <tr>
                        <td>{{$user->first_name.' '.$user->surname}}</td>
                        <td>{{$training->program_day}}</td>
                        <td>{{$training->created_at}}</td>
                        <td>
                            @if ($training->deadline_at)
                                {{Carbon\Carbon::createFromTimestamp($training->deadline_at,'Africa/Nairobi')}}
                            @endif
                        </td>
                        <td>
                            @foreach($stages as $stage)
                                <?php
                                    $file = $stage->files[0];
                                ?>
                                @if ($file->file_type == 2)
                                    <a href="{{$file->file_url}}" data-lightbox="roadtrip">
                                        <img class="task_img" src="{{!empty($file->preview_url) ? $file->preview_url : $file->file_url}}" alt="">
                                    </a>
                                @else

                                    <img data-file="{{$file->file_url}}" id="attachment-img" src="/ico/video-default.png" class="task_video">
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="/admin/tasks/{{$training->id}}/1" class="btn btn-success">Одобрить</a>
                            <a href="/admin/tasks/{{$training->id}}/0" class="btn btn-danger">Отклонить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $trainings->render() !!}
        @endif
    </div>
    <!-- --------------------------------------------------------------- -->
    <div class="modal fade" id="video-modal" modali-backdrop="true" tabindex="1" role="dialog" aria-labelledby="videoModal">
      <div class="display-inline width-eight-perc" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <img src="/ico/close.png" alt="">   
                </span>
            </button>
            <div class="video-js-responsive-container vjs-hd" style="width:80%">
                <video id="training-video" class="video-js vjs-default-skin"
                  controls preload="auto"
                  data-setup='{"responsive": true,"example_option":true}'>
            </div>
          </div>
        </div>
      </div>
    </div>
@overwrite
