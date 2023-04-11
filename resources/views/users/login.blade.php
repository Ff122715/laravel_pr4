@extends('templates.app')
@section('title', 'Вход')

@section('content')

    <form action="{{ route('login.check') }}" method="post">
        @csrf
        <div class="position-absolute top-50 start-50 translate-middle">
            <h2 class="mb-4">Вход</h2>

            <label for="email" class="form-label">Email</label><br>
            <input type="text" id="email" name="email" value="{{ old('email')}}" class="form-control w-auto"><br>

            <label for="password" class="form-label">Пароль</label><br>
            <input type="password" id="password" name="password" class="form-control w-auto"><br>

            <button type="submit" id="submit" name="submit" class="btn btn-primary w-100 ">Вход</button>

            @error('errorLogin')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </form>
@endsection
