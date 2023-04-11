@extends('templates.admin_login_app')
@section('title', 'Вход')

@section('content')

    <form action="{{ route('admin.login.check') }}" method="post">
        @csrf
        <div class="position-absolute top-50 start-50 translate-middle">
            <h2 class="mb-4">Вход</h2>

            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button class="btn btn-primary w-100">Войти</button>

            @error('errorLogin')
            <div class="mt-3 alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </form>
@endsection

