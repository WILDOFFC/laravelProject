@extends('theme');

@section('page-name', 'Отзывы')

@section('content')
    <div class="container">
        @foreach($reviews as $review)
            <div class="review">
                <p>{{ $review->text }}</p>
                <a href="{{ route('review.update', ['status'=>true, 'review'=>$review->id]) }}">Одобрить</a>
                <a href="{{ route('review.update', ['status'=>false, 'review'=>$review->id]) }}">Отклонить</a>
            </div>
        @endforeach
    </div>
@endsection
