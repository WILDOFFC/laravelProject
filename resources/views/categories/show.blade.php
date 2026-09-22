@extends('theme')

@section('page-name')
    {{ $categories->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="#">
                    <input type="number" name="p_from">
                    <input type="number" name="p_to">
                    <input type="submit" value="Применить">
                </form>
            </div>
            <div class="col-9 d-flex">
                @foreach($products as $product)
                    @include('parts.product.snippet', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
@endsection
