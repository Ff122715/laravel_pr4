@extends('templates.admin_app')

@section('title', 'admin orders')

@section('content')
    <h1>Заказы</h1>

    <p>
        Найдено заказов: {{ count(old('orders') ?? $orders) }}
    </p>

    <form action="{{ route('admin.orders.filter') }}">
        <select aria-label="Default select example" name="status_id" onchange="this.form.submit()" class="form-select w-auto">
            <option value="all" id="all">Все</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}"
                        id="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
            @endforeach
        </select>
    </form>

    @include('inc.flash')

    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col" class="text-center">Кол-во товаров</th>
            <th scope="col">Дата</th>
            <th scope="col">Статус</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('orders') ?? $orders) as $order)
            <tr>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->user->name }}</a>
                </td>
                <td class="text-center">{{ $order->info_orders->pluck('count')->sum() }}</td>
                <td>{{ $order->dateClassic }}</td>
                <td>{{ $order->status->name }}
                </td>
                <td>
                    @if ($order->status->id == 1)
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#modalConfirm{{ $order->id }}" value="{{ $order->id }}">
                            Подтвердить
                        </button>
                        @include('admin.orders.modal-confirm')
                    @endif

                        @if ($order->status->id != 3)
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalCancel{{ $order->id }}" value="{{ $order->id }}">
                                Отменить
                            </button>
                            @include('admin.orders.modal-cancel')
                        @endif
                </td>
                <td>

                </td>
            </tr>
        @empty
            <p>Заказы данного статуса отсутствуют</p>
        @endforelse
        </tbody>
    </table>
@endsection


