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
                    <input type="number" name="p_from" value="{{ request('p_from') }}">
                    <input type="number" name="p_to" value="{{ request('p_to') }}">
                    <input type="submit" value="Применить">
                    <a href="{{ route('countries.show', ['country' => $country]) }}">Сбросить</a>
                    <select name="sortBy" id="sortBySelect">
                        <option value="asc" {{ request('sortBy') == 'asc' ? 'selected' : '' }}>По названию(А-Я)</option>
                        <option value="desc" {{ request('sortBy') == 'desc' ? 'selected' : '' }}>По названию(Я-А)</option>
                        <option value="priceDown" {{ request('sortBy') == 'priceDown' ? 'selected' : '' }}>По убыванию цены</option>
                        <option value="priceUp" {{ request('sortBy') == 'priceUp' ? 'selected' : '' }}>По возрастанию цены</option>
                        <option value="newerFirst" {{ request('sortBy') == 'newerFirst' ? 'selected' : '' }}>Сначала новые</option>
                    </select>
                    <select name="filterByCategory" id="filterCategoryField">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('filterByCategory') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
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
            {{ $products->links()->withQueryString('') }}
        </div>
    </div>
@endsection
