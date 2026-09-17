@extends('theme')

@section('page-name')
    {{ $product->name }}
@endsection
@section('content')
    <div class="container-lg border">
        <div class="row">
            <div class="col-6">
                <img
                    src="https://xiaomi-sib.ru/media/cache/thumb_540_600/media/product_variant_image/730//c9569798583756bf129488c0fb59967aecb28121.jpg"
                    alt="Фото {{ $product->name }}">
            </div>
            <div class="col-6 ">
                <h5 class="border padding" style="border-radius: 5px">{{ $product->name }}</h5>
                <div>
                    <ul>
                        <li>Страна производства {{ $country->name }}</li>
                    </ul>
                </div>
                <div class="mt-auto d-flex justify-content-between align-items-center">
                    <div class="border rounded-3 p-3 flex-fill me-2">{{ $product->price }}₽</div>
                    <button class="btn" style="background-color: red;">
                        <span class="fs-5 fw-bold text-light">Купить</span>
                    </button>
            </div>
        </div>
@endsection
