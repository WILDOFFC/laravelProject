<div class="col-md-3 col-sm-4 col-lg-3">
    <div class="card h-100 border-0 shadow-sm product-card">
        <img
            src="{{ asset('storage/'.$product->image_path) }}"
            class="card-img-top product-img" alt="Фототовара!!!!">
        <div class="card-body d-flex flex-column">
            <a href="/categories/{{ $product->category_id }}"><span class="text-muted small text-uppercase
tracking-wider">{{ $categories->find($product->category_id)->name }}</span></a>
            <a href="countries/{{ $product->country_id }}"><span class="text-muted small text-uppercase
tracking-wider">{{ $countries->find($product->country_id)->name }}</span></a>
            <a href="{{ route('products.show', ['product'=>$product->slug]) }}"><h5 class="card-title fw-semibold my-1">{{ $product->name }}</h5></a>
            <div class="text-warning mb-2 small">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                    class="bi bi-star-half"></i>
                <span class="text-muted ms-1">(124)</span>
            </div>
            <div class="mt-auto d-flex justify-content-between align-items-center">
                <button class="btn" style="background-color: red;">
                    <span class="fs-5 fw-bold text-light">{{ $product->finalPrice() }}₽</span>
                </button>
            </div>
        </div>
    </div>
</div>
