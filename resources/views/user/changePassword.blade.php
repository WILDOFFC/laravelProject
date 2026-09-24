@extends('theme')

@section('page-name', 'Сброс пароля')

@section('content')
    <div class="container">
        <form action="{{ route('auth.passwordUpdate') }}" method="post" class="">
            @csrf
            <div class="form-group">
                <label for="oldPassword">Старый пароль</label>
                <input type="password" class="form-control" id="oldPasswordField" name="oldPassword">
            </div>
            <div class="form-group">
                <label for="newPassword">Новый пароль</label>
                <input type="password" class="form-control" id="newPasswordField" name="newPassword">
            </div>
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Сменить пароль</button>
        </form>
        @if (!$errors->isEmpty())
        @foreach ($errors->all() as $error)
        <p class="text-danger p-2">{{ $error }}</p>
        @endforeach
        @endif
    </div>
@endsection
