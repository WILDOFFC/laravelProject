@extends('theme')
@section('page-name')
    Создать товар
@endsection
@section('content')
    <form action="{{ route('products.store') }}" method="post" class="form">
        @csrf
        <div class="group-row">
            <label for="name">Название товара</label>
            <input type="text" name="name">
        </div>
        <div class="group-row">
            <label for="price">Цена</label>
            <input type="number" name="price">
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
        <input type="submit" value="Создать" class="btn accent-bg bold-btn">
    </form>
@endsection
