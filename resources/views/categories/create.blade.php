@extends('theme')

@section('page-name', "Создание категории товаров")

@section('content')
<div class="container">
        <form action="{{ route('categories.store') }}" method="post" class="d-flex flex-column gap-3 col-md-6 col-lg-5 mx-auto border rounded-3 p-3">
            @csrf
            <div class="form-group">
                <label for="categoryField">Название категории</label>
                <input type="text" class="form-control" id="categoryField" name="category_name">
            </div>
            <button type="submit" class="btn btn-primary">Создать категорию</button>
        </form>
</div>
@endsection