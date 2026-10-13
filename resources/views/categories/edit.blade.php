@extends('theme')

@section('page-name', "Создание категории товаров")

@section('content')
<div class="container">
        <form action="{{ route('categories.update', $category) }}" method="post" class="d-flex flex-column gap-3 col-md-6 col-lg-5 mx-auto border rounded-3 p-3">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="categoryField">Новое название категории</label>
                <input type="text" class="form-control" id="categoryField" name="category_name">
            </div>
            <button type="submit" class="btn btn-primary">Изменить категорию</button>
        </form>
</div>
@endsection