@extends('theme')

@section('page-name', 'Профиль')

@section('content')
    <div class="container">

        <div class="user-info">
            <div class="user-avatar">
            </div>
            <h3>{{ $user->name }}</h3>
            <h4>Аккаунт создан: {{ $user->created_at }}</h4>
        </div>
    </div>
@endsection