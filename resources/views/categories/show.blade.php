@extends('theme')

@section('page-name')
    {{ $categories->name }}
@endsection

@section('content')
    <div class="container d-flex">
        @foreach($products as $product)
            @include('parts.product.snippet', ['product' => $product]);
        @endforeach
    </div>
@endsection
