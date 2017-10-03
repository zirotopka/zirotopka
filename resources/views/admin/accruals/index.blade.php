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
        <div class="col-xs-12 col-sm-8 col-md-3 col-lg-3">
            <form action="">
                <input type="button" class="btn btn-success" value="Выплаты" id="get">
            </form>
        </div>
    </div>
    <div class="row">
        @if(count($accruals) == 0)
            <div class="alert alert-warning">
                Счета отсутствуют
            </div>
        @else
            <table class="table table-striped" id="users-table">
                <thead>
                <th>#</th>
                <th>Дата</th>
                <th>Пользователь</th>
                <th>Тип</th>
                <th>Сумма</th>
                <th>Комментарий</th>
                </thead>
                <tbody>
                <tr>
                    <form method="post">
                        {{ csrf_field() }}
                        <td></td>
                        <td></td>
                        <td>
                            <input name="name" placeholder="Имя" value="{{$placeholders['name']}}">
                        </td>
                        <td>
                            <select name="type">
                                <option value=""
                                        @if ($placeholders['type'] == '')
                                        selected
                                        @endif
                                >Выбрать...
                                </option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}"
                                            @if ($placeholders['type'] == $type->id)
                                            selected
                                            @endif
                                    >{{$type->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <a href="/admin/accruals" class="btn btn-default btn-default btn-sm">Сброс</a>
                        </td>
                        <td>
                            <button class="btn btn-default btn-success btn-sm">Поиск</button>
                        </td>
                    </form>

                </tr>
                @foreach($accruals as $accrual)
                    <tr>
                        <td>{{ $accrual->id }}</td>
                        <td>{{ $accrual->created_at }}</td>
                        <td>
                            @if (!empty($accrual->user))
                                {{ $accrual->user->first_name }} {{ $accrual->user->surname }}
                            @endif
                        </td>
                        <td>
                            @if (!empty($accrual->type))
                                {{ $accrual->type->name }}
                            @endif
                        </td>
                        <td>{{ $accrual->sum }}</td>
                        <td>{{ $accrual->comment }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $accruals->render() !!}
        @endif
    </div>
@overwrite
