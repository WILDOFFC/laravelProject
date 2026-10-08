@extends('theme')

@section('page-name')
    {{ $product->name }}
@endsection
@section('content')
    <div class="container-lg border">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="Фото {{ $product->name }}"
                    style="width: 600px;">

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
            <div class="reviews border border-primary rounded-3">
                <h2 class="text-primary">Отзывы</h2>
                <div class="leave-review">
                    <form action="{{ route('review.create') }}" method="post" class="d-flex flex-column col-lg-2">
                        @csrf
                        <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                        <select name="rating" id="ratingField">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <textarea name="text" id="" cols="20" rows="5" class="border border-primary rounded-3"></textarea>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
                <ul class="reivews-list">
                    @foreach($reviews as $review)
                        <li class="d-flex flex-column p-3 border">
                            <p>{{ $review->user->name }}</p>
                            <p>{{ $review->text }}</p>
                        </li>
                    @endforeach
                </ul>
                <div class="review">
                    <h3 class="review-name"></h3>
                </div>
            </div>
        </div>
    </div>

@endsection