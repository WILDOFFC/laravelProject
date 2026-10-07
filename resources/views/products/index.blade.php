@extends('theme')

@section('page-name')
    Каталог товаров
@endsection

@section('content')
    <div class="container-lg d-flex">
        <h2>Новинки</h2>
        @foreach($productsLast as $product)
            @include('parts.product.snippet', ['product'=>$product]);
        @endforeach
    </div>
    <div class="container my-3">
        <h2>Страны производства</h2>
        @foreach($countries as $country)
            <div class="p-2 border"><a href="/countries/{{ $country->id }}">{{ $country->name }}</a></div>
        @endforeach
    </div>
    <div class="container my-3">
        <h2>Категории</h2>
        @foreach($categories as $category)
            <div class="p-2 border"><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></div>
        @endforeach
    </div>
    <div class="container d-flex">
        <h2>Каталог</h2>
        @foreach($products as $product)
            @include('parts.product.snippet', ['product'=>$product]);
        @endforeach

    {{ $products->links()}}
@endsection
