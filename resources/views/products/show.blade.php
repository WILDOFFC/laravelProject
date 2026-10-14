@extends('theme')

@section('page-name')
    {{ $product->name }}
@endsection
@section('content')
    <div class="container-lg border">
        <div class="row">
            <div class="col-6 p-2">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="Фото {{ $product->name }}"
                    style="width: 500px;" class="rounded-3">

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
                <div class="leave-review m-3 border border-primary rounded-3">
                    <form action="{{ route('review.create') }}" method="post" class="d-flex row col-lg-4 p-3 gap-2">
                        <h4>Оставить отзыв</h4>
                        @csrf
                        <input type="number" name="product_id" value="{{ $product->id }}" hidden>
                        <select name="rating" id="ratingField" class="col-lg-2 p-2 bg-primary border border-primary text-light rounded-3">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <textarea name="text" id="" cols="20" rows="5" class="border border-primary rounded-3"></textarea>
                        <input type="text" name="bot_check" class="hidden-obj">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
                <ul class="reivews-list  list-unstyled row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 my-4">
                    @foreach($reviews as $review)
                        <li class="col">
                            <div class="card h-100 border-primary shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-danger">{{ $review->user->name }}</h5>

                                    <div class="mb-2">
                                        <span class="fw-bold text-danger">
                                            <i class="bi bi-star-fill text-warning"></i> {{ $review->rating }} / 5
                                        </span>
                                    </div>

                                    <hr class="my-2">

                                    <p class="card-text flex-grow-1 mb-0">{{ $review->text }}</p>
                                </div>
                            </div>
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