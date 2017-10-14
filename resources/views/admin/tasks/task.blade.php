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
    <center>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <td>Загружено</td>
                    <td>{{$training_stage->created_at}}</td>
                </tr>
                <tr>
                    <td>Описание стадии</td>
                    <td>{{$stage->description}}</td>
                </tr>
                <tr>
                    <td>Количество повторений</td>
                    <td>{{$stage->repeat_count}}</td>
                </tr>
                <tr>
                    <td>Количество повторений</td>
                    <td>{{$stage->repeat_count}}</td>
                </tr>
                <tr>
                    <td>Упражнение</td>
                    <td>{{$exercise->name}}</td>
                </tr>
                <tr>
                    <td>Описание упражнения</td>
                    <td>{{$exercise->description}}</td>
                </tr>
                </tbody>
            </table>
            @foreach($files as $file)

                @if ($file->file_type == 2)
                    <img src="{{$file->file_url}}" width="800px">
                    <br>
                @else
                    <video id="my-video" class="video-js" controls preload="auto" width="800px" data-setup="{}">
                        <source src="{{$file->file_url}}" type='video/mp4'>
                    </video>
                @endif

            @endforeach
        </div>
    </center>
@overwrite
