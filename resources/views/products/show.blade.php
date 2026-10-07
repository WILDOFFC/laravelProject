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
                    <div class="border rounded-3 p-3 flex-fill me-2">{{ $product->finalPrice() }}₽</div>
                    <button class="btn" style="background-color: red;">
                        <span class="fs-5 fw-bold text-light">Купить</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
        <h2>Отзывы</h2>
            <div class="leave-review">
                <form action="{{ route('review.create') }}" method="post">
                    @csrf
                    <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                    <select name="rating" id="ratingField">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="1">5</option>
                    </select>
                    <textarea name="text" id="" cols="30" rows="10"></textarea>
                    <button type="submit">Отправить</button>
                </form>
            </div>
            <ul class="reivews-list">
                @foreach($reviews as $review)
                <li>
                    @dd($review->users->name)
                    <p>{{ $review->users->name }}</p>
                    <p>{{ $review->text }}</p>
                </li>
                @endforeach
            </ul>
            <div class="review">
                <h3 class="review-name"></h3>
            </div>
        </div>

@endsection
