@extends('theme')

@section('page-name', 'Регистрация')

@section('content')
    <form action="{{ route('auth.register.store') }}" method="post" class="container w-500px">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Имя пользователя</label>
            <input type="text" name="name" class="form-control" id="nameInput">
        </div>
        <div class="form-group">
            <label for="email">Адрес электронной почты</label>
            <input type="email" class="form-control" id="emailInput" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Адреса эл. почты не передаются третьим лицам.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" name="password" class="form-control" id="passwordInput">
        </div>
        <button type="submit" class="btn btn-primary">Создать аккаунт?</button>
    </form>
@endsection