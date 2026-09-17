@extends('theme')

@section('page-name', 'Категории')'

@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div>
                <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
