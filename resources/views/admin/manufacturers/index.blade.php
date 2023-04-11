@extends('templates.admin_app')

@section('title', 'admin manufacturers')

@section('content')
    <h1>Производители</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#modalAdd">
        Создать
    </button>
    @include('admin.manufacturers.modal-add')

        <form action="{{ route('admin.manufacturers.filter') }}" class="mt-5">
            <select aria-label="Default select example" name="country_id" onchange="this.form.submit()" class="form-select w-auto">
                <option value="all" id="all">Все</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}"
                            id="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </form>

    @include('inc.flash')

    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Страна</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('manufacturers') ?? $manufacturers) as $manufacturer)
            <tr>
                <td>{{ $manufacturer->name }}</td>
                <td>{{ $manufacturer->country->name }}</td>
                <td>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete{{ $manufacturer->id }}" value="{{ $manufacturer->id }}">
                        Удалить
                    </button>
                    @include('admin.manufacturers.modal-delete')
                </td>
                <td>
                    <a href="{{ route('admin.manufacturers.show', $manufacturer->id) }}" class="btn btn-primary">Товары</a>
                </td>
                {{--                    @if ($order->status->id == 1)--}}
                {{--                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"--}}
                {{--                                data-bs-target="#modalConfirm{{ $order->id }}" value="{{ $order->id }}">--}}
                {{--                            Подтвердить--}}
                {{--                        </button>--}}
                {{--                        @include('admin.orders.modal-confirm')--}}
                {{--                    @endif--}}
                {{--                    @if ($order->status->id == 3)--}}
                {{--                        {{ $order->reason }}--}}
                {{--                    @endif--}}
                {{--                </td>--}}
                {{--                <td>--}}
                {{--                </td>--}}
            </tr>
        @empty
            <p></p>
        @endforelse
        </tbody>
    </table>
@endsection


