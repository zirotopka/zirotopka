@extends('admin.layouts.main')

@section('css')
    @parent
@overwrite

@section('js')
    <script type="text/javascript" src="/assets/js/admin/users.js?{{time()}}"></script>

    @parent
@overwrite

@section("content")
    <!-- <div class="row">
        <div class="col-md-12">
            <a href="/users/add" class="btn btn-sm btn-info"><i class="fa fa-plus"></i>&nbsp;&nbsp;Добавить</a>
        </div>
    </div>
 -->
    <div class="row">
        @if(count($users) == 0)
            <div class="alert alert-warning">
                Пользователей не найдено
            </div>
        @else
            <form method="GET">
                <table class="table table-striped" id="users-table">
                    <thead>
                        <th>#</th>
                        <th>Имя</th>
                        <th>E-Mail</th>
                        <th>Роль</th>
                        <th>Текущая программа</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="/admin/users/{{ $user->id }}">{{ $user->surname }} {{ $user->first_name }}  {{ $user->last_name }}</a></td>
                                <td>
                                    <?php $role = $user->roles->first() ?>
                                    @if (!empty($role))
                                        {{ $role->name }}
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($user->current_program))
                                        {{$user->current_program->name}}
                                    @endif
                                </td>
                                <td class="tc-center nowrap">
                                    <div class="users-toolbar" role="toolbar">        
                                        <div class="btn-group" role="group">
                                            @if($user->status)
                                                <a href="#" data-id="{{$user->id}}" data-status="0" class="btn btn-warning btn-sm m-user-status">Отключить</a>
                                            @else
                                                <a href="#" data-id="{{$user->id}}" data-status="1" class="btn btn-success btn-sm m-user-status">Включить</a>
                                            @endif
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a href="#" data-id="{{$user->id}}" class="btn btn-default btn-danger btn-sm m-user-delete">Удалить</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            {!! $users->render() !!}
        @endif
    </div>
@overwrite
