@extends('theme')

@section('page-name')
    {{ $categories->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="#">
                    <input type="number" name="p_from">
                    <input type="number" name="p_to">
                    <input type="submit" value="Применить">
                    <a href="{{ route('categories.show', ['category' => $categories]) }}">Сбросить</a>
                    <select name="sortBy" id="sortBySelect">
                        <option value="asc">По названию(А-Я)</option>
                        <option value="desc">По названию(Я-А)</option>
                    </select>
                </form>
            </div>
            <div class="col-9 d-flex">
                @if (!$products->isEmpty())
                    @foreach($products as $product)
                        @include('parts.product.snippet', ['product' => $product])
                    @endforeach
                @else
                    <h2>Пустовато тут...</h2>
                @endif
            </div>
        </div>
    </div>
@endsection