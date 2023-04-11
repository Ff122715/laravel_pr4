@extends('templates.admin_app')

@section('title', 'create')

@section('content')
    <h1>Создание категории</h1>

    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <label for="name">Наименование</label><br>
        <input type="text" id="name"
               name="name" value="{{ old('name') }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror <br>

        <button>Создать</button>
    </form>

@endsection
