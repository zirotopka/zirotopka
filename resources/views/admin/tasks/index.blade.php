@extends('admin.layouts.main')

@section('css')
    @parent
    <link rel="stylesheet" href="/assets/admin/accruals.css">
    <link href="http://vjs.zencdn.net/6.2.5/video-js.css" rel="stylesheet">
@overwrite

@section('js')
    @parent
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
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
                                    <video src="{{$file->file_url}}" class="task_video"></video>
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
@overwrite
