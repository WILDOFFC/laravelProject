@extends('theme')

@section('page-name', 'Профиль')

@section('content')
    <div class="container">
        <h1 class="text-primary">Панель администратора</h1>
        <div class="user-info">
            <div class="user-avatar">
            </div>
            <h3>{{ $user->name }}</h3>
            <a href="{{ route('products.create') }}" class="btn bg-danger text-white">Создать новый товар</a>
            <a href="{{ route('categories.create') }}" class="btn bg-danger text-white">Создать новую категорию</a>
            <a href="{{ route('reviews.show') }}" class="btn bg-danger text-white">Отзывы</a>
        </div>
    </div>
@endsection
