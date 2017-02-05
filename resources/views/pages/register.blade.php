@extends('pages.main')

@push('styles')
<link rel="stylesheet" type="text/css" href="../css/login.css">
@endpush

@section('header')
@endsection

@section('content')
    <div class="auth">
        <h2>{{ $title }}</h2>
        <form method="post">
            {{ csrf_field() }}
            <div class="auth-container">
                <span class="auth--tag">Имя</span>
                <input class="pages-iput" type="text" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <div class="danger"><span>{{ $errors->first('name') }}</span></div>
                @endif
            </div>
            <div class="auth-container">
                <span class="auth--tag">Логин</span>
                <input class="pages-iput" type="text" name="login" value="{{ old('login') }}">
                @if ($errors->has('login'))
                    <div class="danger"><span>{{ $errors->first('login') }}</span></div>
                @endif
            </div>
            <div class="auth-container">
                <span class="auth--tag">Пароль</span>
                <input class="pages-iput" type="password" name="password">
                @if ($errors->has('password'))
                    <div class="danger"><span>{{ $errors->first('password') }}</span></div>
                @endif
            </div>
            <div class="auth-container">
                <span class="auth--tag">Пароль</span>
                <input class="pages-iput" type="password" name="password2">
                @if ($errors->has('password2'))
                    <div class="danger"><span>{{ $errors->first('password2') }}</span></div>
                @endif
            </div>
            <div class="auth-container">
                <span class="auth--tag">Email</span>
                <input class="pages-iput" type="text" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="danger"><span>{{ $errors->first('email') }}</span></div>
                @endif
            </div>
            <input class="button" type="submit" value="Зарегистрироваться">
            <a class="button" href="/">Отменить</a>
        </form>
    </div>
@endsection