@extends('templates.admin_app')

@section('title', 'Товары')

@section('content')
    <h1 class="mb-4">Товары</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Создать</a>

    @include('inc.flash')

    <form action="{{ route('admin.products.filter_manufacturer') }}" class="mt-4">
        <label for="man">Производитель</label>
        <select aria-label="Default select example" name="manufacturer_id" onchange="this.form.submit()" class="form-select w-auto" id="man">
            <option value="all" id="all">Все</option>
            @foreach($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}"
                        id="{{ $manufacturer->id }}" {{ old('manufacturer_id') == $manufacturer->id ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
            @endforeach
        </select>
    </form>

    <form action="{{ route('admin.products.filter_country') }}" class="mt-4">
        <label for="country">Страна</label>
        <select aria-label="Default select example" name="country_id" onchange="this.form.submit()" class="form-select w-auto" id="country">
            <option value="all" id="all">Все</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}"
                        id="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
            @endforeach
        </select>
    </form>

    <table class="table table-striped table-sm mt-4">
        <thead>
        <tr>
            <th scope="col">Изображение</th>
            <th scope="col">Наименование</th>
            <th scope="col">Кол-во</th>
            <th scope="col">Высота (см)</th>
            <th scope="col">Цена</th>
            <th scope="col">Производитель</th>
            <th scope="col">Страна</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse((old('products') ?? $products) as $product)
            <tr>
                <td>@include('inc/first_img')</td>
                <td>{{ $product->name }}</td>
                <td class="text-center">{{ $product->count }}</td>
                <td class="text-center">{{ $product->height }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->manufacturer->name }}</td>
                <td>{{ $product->manufacturer->country->name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Изменить</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete{{ $product->id }}" value="{{ $product->id }}">
                        Удалить
                    </button>
                    @include('admin.products.modal-delete')
                </td>
            </tr>
        @empty
            <p>Товары от данного производителя отсутствуют</p>
        @endforelse
        </tbody>
    </table>
@endsection
