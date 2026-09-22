@extends('theme')

@section('page-name')
    Поиск
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3" style="background-color: black;">
                sdasda
            </div>
            <div class="col-9 d-flex align-items-start">        @foreach($products as $product)
                    @include('parts.product.snippet');

                @endforeach</div>
        </div>


    </div>
@endsection
