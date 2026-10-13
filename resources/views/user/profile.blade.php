@extends('theme')
@section('page-name', 'Профиль')
@section('content')
<div class="container py-4">
    
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
            <div class="user-avatar mb-3">
                <i class="bi bi-person-circle display-1 text-secondary"></i>
            </div>
            
            <h3 class="d-inline-block px-3 py-2 border border-primary rounded-3 mb-3">{{ $user->name }}</h3>
            
            <h6 class="text-muted mb-3">Аккаунт создан: {{ $user->created_at }}</h6>
            
            <div class="d-flex justify-content-center gap-2 flex-wrap">
                <a href="{{ route('auth.changePassword') }}" class="btn btn-danger">Изменить пароль</a>
                @if(Auth::user()->is_admin() == 1)
                    <a href="{{ route('admin.panel') }}" class="btn btn-outline-danger">Панель администратора</a>
                @endif
            </div>
        </div>
    </div>

    {{-- Блок с отзывами --}}
    <h4 class="mb-3">Отзывы пользователя</h4>
    
    <ul class="list-unstyled row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($reviews as $review)
            <li class="col">
                <div class="card h-100 border-primary shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-danger">{{ $review->product->name }}</h5>
                        
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
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    Пользователь не оставил отзывов на товары.
                </div>
            </div>
        @endforelse
    </ul>
    
</div>
@endsection