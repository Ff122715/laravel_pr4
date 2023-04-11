@extends('templates.app')

@section('title', 'Пользователи')

@section('content')
    <div class="container">
        @forelse($users as $user)
{{--            <p>{{ $user->fullName }}</p>--}}
{{--            <p>{{ $user->idSurname }}</p>--}}
            <p>{{ $user->shortName }}</p>
            @empty
                <p>tgyh</p>
        @endforelse
    </div>

@endsection
