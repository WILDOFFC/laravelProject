@extends('theme')

@section('page-name', 'Авторизация')

@section('content')
    <form action="{{ route('auth.login.submit') }}" method="post">
        @csrf
        <div class="group-row">
            <input type="email" name="email" id="email">
        </div>
        <div class="group-row">
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Создать аккаунт">
    </form>
@endsection
