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
        @if(count($accruals) == 0)
            <div class="alert alert-warning">
                Счета отсутствуют
            </div>
        @else
            <form method="GET">
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
                        @foreach($accruals as $accrual)
                            <tr>
                                <td>{{ $accrual->id }}</td>
                                <td>{{ $accrual->created_at }}</td>
                                <td>
                                    @if (!empty($accrual->user))
                                        {{ $accrual->user->first_name }} {{ $accrual->user->surname_name }}
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
            </form>
            {!! $accruals->render() !!}
        @endif
    </div>
@overwrite
