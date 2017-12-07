@extends('admin.layouts.main')

@section('css')
    <link rel="stylesheet" href="/assets/admin/users.css">

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
            <table class="table table-striped" id="users-table">
                <thead>
                <th>#</th>
                <th>Имя</th>
                <th>E-Mail</th>
                <th>Олата</th>
                <th>Текущая программа</th>
                <th>Статус</th>
                <th>Баланс</th>
                <th>Заработал</th>
                <th>Вывел</th>
                <th></th>
                <th></th>
                <th>Действия</th>
                </thead>
                <tbody>
                <tr>
                    <form method="post">
                        {{ csrf_field() }}
                        <td></td>
                        <td><input name="name" placeholder="Имя" value="{{$placeholders['name']}}"></td>
                        <td><input name="email" placeholder="Email" value="{{$placeholders['email']}}"></td>
                        <td>
                            <select name="role">
                                <option value=""
                                        @if ($placeholders['role'] == '')
                                        selected
                                        @endif
                                >Выбрать...</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}"
                                    @if ($placeholders['role'] == $role->id)
                                        selected
                                    @endif
                                    >{{$role->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                        <td>
                            <a href="/admin/users" class="btn btn-default btn-default btn-sm">Сброс</a>
                        </td>
                        <td>
                            <button class="btn btn-default btn-success btn-sm">Поиск</button>
                        </td>
                    </form>

                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <?php $role = $user->roles->first() ?>
                            <a href="/admin/users/{{ $user->id }}">{{ $user->surname }} {{ $user->first_name }}  {{ $user->last_name }}</a><span>
                                {{!empty($role) ? ' ('.$role->name.' )' : ''}}
                            </span>
                        </td>
                        <td>
                            @if (!empty($user->email))
                                {{$user->email}}
                            @endif
                        </td>
                        <td class="{{!empty($user->is_programm_pay) ? 'text-success' : 'text-danger'}}">
                            @if (!empty($user->is_programm_pay)) 
                                Да  <i class="fa fa-check" aria-hidden="true" style="color:#3c763d"></i>
                            @else
                                Нет <i class="fa fa-close" aria-hidden="true" style="color:#a94442"></i>
                            @endif
                        </td>
                        <td>
                            @if (!empty($user->current_program))
                                {{$user->current_program->name}}
                            @endif
                        </td>
                        <td class="{{!empty($user->status) ? 'text-success' : 'text-info'}}">
                            @if(!empty($user->status))
                                Активен <i class="fa fa-check" aria-hidden="true" style="color:#3c763d"></i>
                            @else
                                Заморожен <i class="fa fa-snowflake-o" aria-hidden="true" style="color:#31708f"></i>
                            @endif
                        </td>
                        <td>
                            <?php
                                $balance = 0;

                                if (!empty($user->balance)) {
                                    $balance = $user->balance->sum;
                                }
                            ?>
                            {{$balance}}
                        </td>
                        <td class="text-success">
                            <?php
                                $accruals_input = $user->accruals_input->sum('sum');
                            ?>
                            {{$accruals_input}}
                        </td>
                        <td class="text-danger">
                            <?php
                                $accruals_output = $user->accruals_output->sum('sum');
                            ?>
                            {{$accruals_output}}
                        </td>
                        <td>
                            <a href="{{'/admin/messages/sendAll?recipient='.$user->id}}">
                                <i class="fa fa-envelope-open" aria-hidden="true" style="color:black"></i>
                            </a>
                        </td>
                        <td class="tc-center nowrap">
                            <div class="users-toolbar" role="toolbar">
                                <div class="btn-group" role="group">
                                    @if($user->status)
                                        <a href="#" data-id="{{$user->id}}" data-status="0"
                                           class="btn btn-warning btn-sm m-user-status">Отключить</a>
                                    @else
                                        <a href="#" data-id="{{$user->id}}" data-status="1"
                                           class="btn btn-success btn-sm m-user-status">Включить</a>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" data-id="{{$user->id}}"
                                   class="btn btn-default btn-danger btn-sm m-user-delete">Удалить</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->render() !!}
        @endif
    </div>
@overwrite
