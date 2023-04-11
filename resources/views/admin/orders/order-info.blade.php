@extends('templates.admin_app')

@section('title', 'Инфо о заказе')

@section('content')

    <h3 class="mb-4">Заказ от {{ $order1->dateClassic }} {{ $order1->user->name }}</h3>
    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">Товар</th>
            <th scope="col">Кол-во</th>

            <th scope="col">Стоимость (руб.)</th>
        </tr>
        </thead>
        <tbody>
        {{--        @dd($orders->status)--}}
        @foreach($info_orders as $order)
            <tr>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->count }}</td>

                <td>{{ $order->product->price }}</td>
            </tr>
        @endforeach
        <div>
            Общая стоимость:
            <span id="totalPrice">{{ $order1->price }} руб.</span>
        </div>
        <div>
            Общее кол-во:
            <span id="totalCount">{{ $order1->info_orders->pluck('count')->sum() }} шт.</span>
        </div>
        </tbody>
    </table>
@endsection
