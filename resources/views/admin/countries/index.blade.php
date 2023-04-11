@extends('templates.admin_app')

@section('title', 'admin countries')

@section('content')
    <h1 class="mb-4">Страны</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalAdd">
        Создать
    </button>
    @include('admin.countries.modal-add')

    @include('inc.flash')

    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Страна</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('countries') ?? $countries) as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>
                    {{--                    <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->user->name }}</a>--}}
                    {{ $country->name }}
                </td>
                <td>
{{--                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Изменить</a>--}}
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete{{ $country->id }}" value="{{ $country->id }}">
                        Удалить
                    </button>
                    @include('admin.countries.modal-delete')
                </td>
                <td>
                    <a href="{{ route('admin.countries.show', $country->id) }}" class="btn btn-primary">Товары</a>
                </td>
            </tr>
        @empty
            <p></p>
        @endforelse
        </tbody>
    </table>
@endsection


