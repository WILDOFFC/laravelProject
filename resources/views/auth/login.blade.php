@extends('theme')

@section('page-name', 'Авторизация')

@section('content')
    <div class="container">
        <form action="{{ route('auth.login.submit') }}" method="post" class="d-flex flex-column gap-3 col-md-6 col-lg-5 mx-auto border rounded-3 p-3">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" value="{{ old('login') }}">
                <small id="loginHelp" class="form-text text-muted">Ваши данные у нас</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="remember">Запомнить меня</label>
                <input type="checkbox" name="remember" id="rememberField" class="checkbox">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="text-danger p-2 bg-danger">{{ $error }}</p>
        @endforeach
        @endif
        <a href="{{ route('auth.register') }}">Нет аккаунта?</a>
    </div>
@endsection
