@extends('theme')

@section('title')
    {{$product->name}})
@endsection

@section('content')
    <form action="{{ route('products.update', $product) }}" method="update">
        @csrf
    </form>
@endsection

