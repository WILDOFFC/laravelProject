@extends('theme')
@section('page-name')
    Создать товар
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('products.store') }}" method="post"
            class="d-flex flex-column gap-3 col-md-6 col-lg-5 mx-auto border rounded-3 p-3"
            enctype="multipart/form-data">
            @csrf
            <div class="group-row">
                <label for="name">Название товара</label>
                <input type="text" name="name">
            </div>
            <div class="group-row">
                <label for="product_preview_field">Превью товара</label>
                <input type="file" name="product_preview" id="product_preview_field">
            </div>
            <div class="group-row">
                <label for="price">Цена</label>
                <input type="number" name="price">
            </div>
            <div>
                <label for="price_opt">Оптовая цена</label>
                <input type="number" name="price_opt">
            </div>
            <div class="group-row">
                <label for="description">Описание товара</label>
                <textarea name="description" id="desc" cols="30" rows="10"></textarea>
            </div>
            <div class="group-row">
                <label for="country">Страна</label>
                <select name="country_id" id="country">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="group-row">
                <label for="categories_id">Категории</label>
                <select name="category_id" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Создать товар</button>
        </form>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger p-2 bg-danger">{{ $error }}</p>
            @endforeach
        @endif
    </div>
@endsection