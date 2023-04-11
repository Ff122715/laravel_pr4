@extends('templates.admin_app')

@section('title', 'admin')

@section('content')
    <h1 class="mb-4">Админы</h1>
    <a href="{{ route('admin.admins.create') }}" class="btn btn-success">Добавить</a>

    @include('inc.flash')

    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">login</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('admins') ?? $admins) as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>
                    {{--                    <a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->user->name }}</a>--}}
                    {{ $admin->login }}
                </td>
                <td>
{{--                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Изменить</a>--}}
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete{{ $admin->id }}" value="{{ $admin->id }}">
                        Удалить
                    </button>
                    @include('admin.admins.modal-delete')
                </td>
            </tr>
        @empty
            <p></p>
        @endforelse
        </tbody>
    </table>
@endsection


