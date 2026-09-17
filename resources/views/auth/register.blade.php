@extends('theme')

@section('page-name', 'Регистрация')

@section('content')
    <form action="{{ route('auth.register.store') }}" method="post">
        @csrf
        <div class="group-row">
            <input type="text" name="name" id="name">
        </div>
        <div class="group-row">
            <input type="email" name="email" id="email">
        </div>
        <div class="group-row">
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Создать аккаунт">
    </form>
@endsection

