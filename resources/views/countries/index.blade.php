@extends('theme')

@section('page-name', 'Страны')

@section('content')
    <div class="container">
        @admin
        <a href="{{ route('countries.create') }}" class="btn bg-danger text-white">Создать новую страну</a>
        @endadmin
        <ul class="list-unstyled row row-cols-2 row-cols-md-2 row-cols-lg-6 g-4">
            @foreach($countries as $country)
                <li class="col border border-primary rounded-3 text-center py-3">
                    <a href="/categories/{{ $country->id }}">{{ $country->name }}</a>
                    @admin
                    <a href="{{ route('countries.edit', $country) }}">Изменить категорию</a>
                    <form action="{{ route('countries.destroy', $country) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" onclick="return confirm('Удалить?')" value="Удалить"/>
                    </form>
                    @endadmin
                </li>
            @endforeach
        </ul>
    </div>
@endsection
