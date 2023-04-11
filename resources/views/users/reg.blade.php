@extends('templates.app')
@section('title', 'Регистрация')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="position-absolute top-50 start-50 translate-middle">
            <h2 class="mb-4">Регистрация</h2>

            <label for="name" class="form-label">Имя</label>
            <input type="text" id="name"
                   name="name" value="{{ old('name') }}"
                   class="form-control mb-3 @error('name')is-invalid @enderror">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <label for="email" class="form-label">Email</label><br>
            <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control mb-3">

            <label for="password" class="form-label">Пароль</label><br>
            <input type="password" id="password" name="password" class="form-control mb-3">

            <label for="password_confirmation" class="form-label">Подтверждение пароля</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control mb-4">
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span
            @enderror

            <button type="submit" id="submit" name="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </div>
    </form>
@endsection
