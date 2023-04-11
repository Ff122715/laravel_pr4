@extends('templates.admin_app')

@section('title', 'admin countries')

@section('content')
    <h1 class="mb-4">Пункты доставки</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalAdd">
        Создать
    </button>
    @include('admin.delivery_points.modal-add')

    @include('inc.flash')

    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Пункт доставки</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('delivery_points') ?? $delivery_points) as $point)
            <tr>
                <td>{{ $point->id }}</td>
                <td>
                    {{--                    <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->user->name }}</a>--}}
                    {{ $point->address }}
                </td>
                <td>
{{--                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Изменить</a>--}}
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete{{ $point->id }}" value="{{ $point->id }}">
                        Удалить
                    </button>
                    @include('admin.delivery_points.modal-delete')
                </td>
            </tr>
        @empty
            <p></p>
        @endforelse
        </tbody>
    </table>
@endsection
