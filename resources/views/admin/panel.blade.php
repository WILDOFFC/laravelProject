@extends('theme')

@section('page-name', 'Профиль')

@section('content')
    <div class="container">

        <div class="user-info">
            <div class="user-avatar">
            </div>
            <h3>{{ $user->name }}</h3>
            <h4>Аккаунт создан: {{ $user->created_at }}</h4>
            <a href="{{ route('products.create') }}">Создать новый товар</a>
            <a href="{{ route('reviews.show') }}">Отзывы</a>
        </div>
    </div>
@endsection
