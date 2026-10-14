@extends('theme')

@section('page-name', "Изменение страны")

@section('content')
    <div class="container">
        <form action="{{ route('countries.update', $country) }}" method="post" class="d-flex flex-column gap-3 col-md-6 col-lg-5 mx-auto border rounded-3 p-3">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="categoryField">Новое название страны</label>
                <input type="text" class="form-control" id="countryField" name="country_name" value="{{ $country->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить категорию</button>
        </form>
    </div>
@endsection
