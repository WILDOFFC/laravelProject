@extends('theme')

@section('page-name', 'Админ-панель')

@section('content')
    <div class="container">
                <a class="btn accent-bg border p-2 text-primary"  href="{{ route('products.create') }}">Создать товар</a>
    </div>
@endsection