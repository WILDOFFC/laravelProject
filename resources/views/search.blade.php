@extends('theme')

@section('page-name')
    Поиск
@endsection

@section('content')
    @foreach($products as $product)
        @include('parts.product.snippet');

    @endforeach
@endsection
