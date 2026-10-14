@extends('theme')

@section('page-name')
    Каталог товаров
@endsection

@section('content')
    <div class="container-md m-auto d-flex row">
        <div class="d-flex row gap-3">
            <h2>Новинки</h2>
            <div class="d-flex">
                @foreach($productsLast as $product)
                    @include('parts.product.snippet', ['product' => $product])
                @endforeach
            </div>

        </div>
        <div class="d-flex row gap-3">
            <h2>Страны производства</h2>
            <div class="d-flex gap-2 flex-wrap">
                @foreach($countries as $country)
                    <a href="{{ route('countries.show', ['country' => $country]) }}">
                        <div class="p-5 border border-primary rounded-3">{{ $country->name }}</div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="d-flex row gap-3">

            <h2>Категории</h2>
            <div class="d-flex gap-2 flex-wrap">
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', ['category' => $category]) }}">
                        <div class="p-5 border border-primary rounded-3">{{ $category->name }}</div>
                    </a>
                @endforeach
            </div>
        </div>


        <div class="d-flex row gap-3">
            <a href="{{ route('catalog.index') }}">
                <h2>Каталог</h2>
            </a>
            <div class="d-flex">
                @foreach($products as $product)
                    @include('parts.product.snippet', ['product' => $product])
                @endforeach
            </div>
        </div>


        {{ $products->links()}}
@endsection