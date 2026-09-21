@extends('theme')

@section('page-name', 'Каталог')

@section('content')
    <div class="container-lg">
        <div class="categories">
            <h2>Категории</h2>
            <div class="d-flex gap-2" style="">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                        class="text-primary p-3 border border-primary rounded-3 link-underline-opacity-0">
                        <h3>{{ $category->name }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="countries">
            <h2>Категории</h2>
            <div class="d-flex gap-2">
                @foreach ($countries as $country)
                    <a href="{{ route('countries.index', ['country' => $country->id]) }}"
                        class="text-primary p-3 border border-primary rounded-3 link-underline-opacity-0">
                        <h3>{{ $country->name }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection