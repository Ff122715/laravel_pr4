@extends('templates.admin_app')

@section('title', 'create')

@section('content')
    <h1>Добавление администратора</h1>

    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.admins.store') }}" method="post">
        @csrf
        <label for="login">login</label><br>
        <input type="text" id="login" name="login" value="{{ old('login')}}"><br>

        <label for="password">Пароль</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="password_confirmation">Подтверждение пароля</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>
        @error('password_confirmation')
        <span class="text-danger">{{ $message }}</span
        @enderror

        <button class=" btn btn-outline-success mt-4" type="submit">Добавить</button>
    </form>

@endsection
