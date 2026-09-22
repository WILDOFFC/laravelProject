@extends('theme')

@section('page-name')
    Произведено в {{ $country->name }}
@endsection

@section('content')
    <h2>Произведено в {{ $country->name }}</h2>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="#">
                    <input type="number" name="p_from">
                    <input type="number" name="p_to">
                    <input type="submit" value="Применить">
                    <a href="{{ route('countries.index', ['category' => $categories, 'country'=>$country]) }}">Сбросить</a>
                    <select name="sortBy" id="sortBySelect">
                        <option value="asc">По названию(А-Я)</option>
                        <option value="desc">По названию(Я-А)</option>
                    </select>
                </form>
            </div>
            <div class="col-9 d-flex">
                @if (!$products->isEmpty())
                    @foreach($products as $product)
                        @include('parts.product.snippet', ['product' => $product, 'countries'=>$country])
                    @endforeach
                @else
                    <h2>Пустовато тут...</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
