@extends('theme')

@section('page-name', 'Профиль')

@section('content')
    <div class="container">

        <div class="user-info">
            <div class="user-avatar">
            </div>
            <h3 class="p-3 border border-primary rounded-3 w-fit-content">{{ $user->name }}</h3>
            <h4>Аккаунт создан: {{ $user->created_at }}</h4>
            <a href="{{ route('auth.changePassword') }}" class="btn bg-danger text-white">Изменить пароль</a>
            @if(Auth::user()->is_admin() == 1)
                <a href="{{ route('admin.panel') }}" class="btn bg-danger text-white">Панель администратора</a>
            @endif
            <div class="reviews">
                <ul class="reviews-list">
                    <li class="review">
                        
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
