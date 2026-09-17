@extends('theme')

@section('page-name')
    Произведено в {{ $country->name }}
@endsection

@section('content')
    <h2>Произведено в {{ $country->name }}</h2>
    @foreach($products as $product);
        @include('parts.product.snippet', ['product'=>$product, 'countries'=>$country]);
    @endforeach
@endsection
