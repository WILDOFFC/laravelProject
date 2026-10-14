@extends('theme')

@section('page-name', 'Профиль')

@section('content')
    <div class="container">
        <h1 class="text-primary">Панель администратора</h1>
        <div class="user-info card-body text-center">
            <h3 class="d-inline-block px-3 py-2 border border-primary rounded-3 mb-3">{{ $user->name }}</h3>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
            <a href="{{ route('products.create') }}" class="btn bg-danger text-white">Создать новый товар</a>
            <a href="{{ route('categories.index') }}" class="btn bg-danger text-white">Категории</a>
            <a href="{{ route('countries.index') }}" class="btn bg-danger text-white">Страны</a>
            <a href="{{ route('reviews.index') }}" class="btn bg-danger text-white">Отзывы</a>
            </div>
        </div>
    </div>
@endsection
