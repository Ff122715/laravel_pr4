@extends('templates.app')

@section('title', 'Профиль')

@section('content')
    <div class="container">
{{--        {{ auth()->user()->name }}--}}
    </div>

    <h3>Заказы</h3>

    <table class="table table-sm w-50 ">
        <thead>
        <tr>
            <th scope="col" class="w-25 text-center">Кол-во товаров</th>
            <th scope="col">Дата</th>
            <th scope="col">Статус</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('orders') ?? $orders) as $order)
            @if ($order->status_id != 3)
            <tr>
                <td class="text-center">{{ $order->info_orders->pluck('count')->sum() }}</td>
                <td>{{ $order->dateClassic }}</td>
                <td>{{ $order->status->name }}</td>
                <td>
                @if ($order->status_id == 1)

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete{{ $order->id }}" value="{{ $order->id }}">
                            Удалить
                        </button>
                        @include('users.modal-delete')

                @endif
                </td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class=" btn btn-primary">Подробнее</a>
                </td>
            </tr>
            @endif
        @empty
            <p>Заказы отсутствуют</p>
        @endforelse
        </tbody>
    </table>
@endsection
