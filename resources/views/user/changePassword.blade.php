@extends('theme')

@section('page-name', 'Сброс пароля')

@section('content')
    <div class="container">
        <form action="{{ route('auth.passwordUpdate') }}" method="post" class="d-flex flex-column col-lg-5 m-auto gap-3">
            @csrf
            <div class="form-group">
                <label for="oldPassword">Старый пароль</label>
                <input type="password" class="form-control" id="oldPasswordField" placeholder="Введите старый пароль" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="newPassword">Новый пароль</label>
                <input type="password" class="form-control" id="newPasswordField" placeholder="Введите новый пароль" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="newPasswordConfirmationField">Подтвердите новый пароль</label>
                <input type="password" class="form-control" name="new_password_confirmation" id="newPasswordConfirmationField" placeholder="Подтвердите новый пароль" required>
            </div>
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Сменить пароль</button>
        </form>
        @if (session('success'))
            <div class="alert-success alert">
                {{ session('success') }}
            </div>
        @endif
        @if (!$errors->isEmpty())
            @foreach ($errors->all() as $error)
                <p class="text-danger p-2">{{ $error }}</p>
            @endforeach
        @endif
    </div>
@endsection
