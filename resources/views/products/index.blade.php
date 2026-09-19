@extends('theme')

@section('page-name')
    Каталог товаров
@endsection

@section('content')
    <div class="container-lg d-flex">
        <h2>Новинки</h2>
        @foreach($productsLast as $product)
            <div class="col-md-3 col-sm-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <img
                        src="https://xiaomi-sib.ru/media/cache/thumb_540_600/media/product_variant_image/730//c9569798583756bf129488c0fb59967aecb28121.jpg"
                        class="card-img-top product-img" alt="Фототовара!!!!">
                    <div class="card-body d-flex flex-column">
                        <a href="categories/{{ $product->category_id }}"><span class="text-muted small text-uppercase
tracking-wider">{{ $categories->find($product->category_id)->name }}</span></a>
                        <a href="/products/{{ $product->slug }}"><h5 class="card-title fw-semibold my-1">{{ $product->name }}</h5></a>
                        <div class="text-warning mb-2 small">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-half"></i>
                            <span class="text-muted ms-1">(124)</span>
                        </div>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <button class="btn" style="background-color: red;">
                                <span class="fs-5 fw-bold text-light">{{ $product->price }}₽</span>
                                <span class="text-muted text-decoration-line-through small ms-1">$999</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container my-3">
        <h2>Страны производства</h2>
        @foreach($countries as $country)
            <div class="p-2 border"><a href="/countries/{{ $country->id }}">{{ $country->name }}</a></div>
        @endforeach
    </div>
    <div class="container my-3">
        <h2>Категории</h2>
        @foreach($categories as $category)
            <div class="p-2 border"><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></div>
        @endforeach
    </div>
    <div class="container d-flex">
        <h2>Каталог</h2>
        @foreach($products as $product)
            @include('parts.product.snippet', ['product'=>$product]);
        @endforeach
    
    {{ $products->links() }}
@endsection
