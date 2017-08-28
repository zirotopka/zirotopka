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
                        <td>
                            <button class="btn btn-default btn-success btn-sm">Поиск</button>
                        </td>
                    </form>

                </tr>
                @foreach($trainings as $training)
                    <tr>
                        <td>{{ $training->id }}</td>
                        <td>
                            @php
                                switch ($training->is_moderator_check) {
                                case 0:
                                    echo 'Ожидает проверки';
                                    break;
                                case 1:
                                    echo 'Выполнено';
                                    break;
                                case 2:
                                    echo 'На доработке';
                                    break;
                                case 3:
                                    echo 'Отклонено';
                                    break;
                                }
                            @endphp
                         </td>
                        <td>{{ $training->created_at }}</td>
                        <td>
                            @if (!empty($training->user))
                                {{ $training->user->first_name }} {{ $training->user->surname }}
                            @endif
                        </td>
                        <td>
                            <a href="/admin/tasks/{{$training->id}}">Файлы</a>
                        </td>
                        <td>
                            <a href="/admin/tasks/{{$training->id}}/2" class="btn btn-default">На доработку</a>
                            <a href="/admin/tasks/{{$training->id}}/1" class="btn btn-success">Одобрить</a>
                            <a href="/admin/tasks/{{$training->id}}/3" class="btn btn-danger">Отклонить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $trainings->render() !!}
        @endif
    </div>
@overwrite
