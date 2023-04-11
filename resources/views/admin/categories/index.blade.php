@extends('templates.admin_app')

@section('title', 'admin categories')

@section('content')
    <h1>Категории</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Создать категорию</a>

    @include('inc.flash')

    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Наименование</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    <a href="{{ route('admin.categories.filter', ['category' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </td>
                <td>
                    {{--                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Изменить</a>--}}
                    {{--                <form action="{{ route('admin.categories.filter', ['category' => $category->id]) }}" method="post">--}}
                    {{--                    @csrf--}}
                    {{--                    @method('POST')--}}
                    {{--                    <button type="submit" class="btn btn-primary">Товары</button>--}}
                    {{--                </form>--}}
{{--                    <form action="{{  }}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger">Удалить</button>--}}
{{--                    </form>--}}
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete{{ $category->id }}" value="{{ $category->id }}">
                        Удалить
                    </button>
                    @include('admin.categories.modal-delete')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

