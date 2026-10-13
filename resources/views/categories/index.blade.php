@extends('theme')

@section('page-name', 'Категории')'

@section('content')
    <div class="container">
        @admin
        <a href="{{ route('categories.create') }}" class="btn bg-danger text-white">Создать новую категорию</a>
        @endadmin
        <ul class="list-unstyled row row-cols-2 row-cols-md-2 row-cols-lg-6 g-4">
            @foreach($categories as $category)
                <li class="col border border-primary rounded-3 text-center py-3">
                    <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                    @admin
                    <a href="{{ route('categories.edit', $category) }}">Изменить категорию</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Удалить категорию</button>
                    </form>
                    @endadmin
                </li>
            @endforeach
        </ul>
    </div>
@endsection