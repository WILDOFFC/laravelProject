@extends('theme')

@section('page-name', 'Профиль')

@section('content')
    <div class="container">

        <div class="user-info">
            <div class="user-avatar">
            </div>
            <h3>{{ $user->name }}</h3>
            <h4>Аккаунт создан: {{ $user->created_at }}</h4>
            <input type="text" value="{{ Auth::user()->password }}" >
            <a href="{{ route('auth.changePassword') }}">Изменить пароль</a>
            @if(Auth::user()->is_admin() == 1)
                <a href="{{ route('admin.panel') }}">Панель администратора</a>
            @endif
        </div>
    </div>
@endsection
