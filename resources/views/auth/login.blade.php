@extends('theme')

@section('page-name', 'Авторизация')

@section('content')
    <div class="container">
        <form action="{{ route('auth.login.submit') }}" method="post" class="">
            @csrf
            <div class="form-group">
                <label for="email">Адрес электронной почты</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Адреса эл. почты не передаются третьим лицам.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="remember">Запомнить меня</label>
                <input type="checkbox" name="remember" id="rememberField">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="text-danger p-2">{{ $error }}</p>
        @endforeach
        @endif
        <a href="{{ route('auth.register') }}">Нет аккаунта?</a>
    </div>
@endsection