@extends('admin.layouts.main')

@section('css')
    <link rel="stylesheet" href="/assets/admin/accruals.css">

    @parent
@overwrite

@section('js')
    @parent
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
                <th>#</th>
                <th>Статус</th>
                <th>Дата</th>
                <th>Пользователь</th>
                <th>Файлы</th>
                <th>Рейтинг</th>
                <th>Действия</th>
                </thead>
                <tbody>
                <tr>
                    <form method="post">
                        {{ csrf_field() }}
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            <input name="name" placeholder="Имя" value="{{$placeholders['name']}}">
                        </td>
                        <td>
                            <a href="/admin/tasks" class="btn btn-default btn-default btn-sm">Сброс</a>
                        </td>
                        <td></td>
                        <td>
                            <button class="btn btn-default btn-success btn-sm">Поиск</button>
                        </td>
                    </form>

                </tr>
                @foreach($trainings as $training)
                    <?php
                        $stages = $training->stages
                    ?>
                    @if (count($stages))
                        <tr>
                           <td colspan="7" class="text-center">
                                <b>День тренировки {{$training->program_day}}.{{!empty($training->user) ? ' Участник '.$training->user->first_name.' '.$training->user->surname : ''}} {{!empty($training->is_moderator_check) ? 'Проверено.' : ''}}</b>
                           </td> 
                        </tr>
                    @endif
                    @foreach($stages as $stage)
                        <tr>
                            <td>{{ $stage->id }}</td>
                            <td>
                                @php
                                    switch ($stage->status) {
                                    case 0:
                                        echo 'Отправлено';
                                        break;
                                    case 1:
                                        echo 'На доработке';
                                        break;
                                    case 2:
                                        echo 'Одобрено';
                                        break;
                                    case 3:
                                        echo 'Отклонено';
                                        break;
                                    }
                                @endphp
                             </td>
                            <td>{{ $stage->created_at }}</td>
                            <td>
                                @if (!empty($training->user))
                                    {{ $training->user->first_name }} {{ $training->user->surname }}
                                @endif
                            </td>
                            <td>
                                <a href="/admin/tasks/{{$stage->id}}">Файлы</a>
                            </td>
                            <td>
                                @if (!empty($stage->rating))
                                    <span>{{$stage->rating}}</span>
                                @else
                                    <a href="/admin/rating/{{$stage->id}}/1" class="btn btn-default">1</a>
                                    <a href="/admin/rating/{{$stage->id}}/3" class="btn btn-success">3</a>
                                    <a href="/admin/rating/{{$stage->id}}/5" class="btn btn-danger">5</a>
                                @endif
                            </td>
                            <td>
                                <a href="/admin/tasks/{{$stage->id}}/1" class="btn btn-default">На доработку</a>
                                <a href="/admin/tasks/{{$stage->id}}/2" class="btn btn-success">Одобрить</a>
                                <a href="/admin/tasks/{{$stage->id}}/3" class="btn btn-danger">Отклонить</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            {!! $trainings->render() !!}
        @endif
    </div>
@overwrite
