@extends('theme')

@section('page-name', "Создание категории товаров")

@section('content')
<div class="container">
        <form action="{{ route('countries.store') }}" method="post" class="d-flex flex-column gap-3 col-md-6 col-lg-5 mx-auto border rounded-3 p-3">
            @csrf
            <div class="form-group">
                <label for="countryField">Создать новую страну</label>
                <input type="text" class="form-control" id="countryField" name="country_name">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
</div>
@endsection
