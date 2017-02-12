@extends('pages.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="../css/login.css">
@endpush

@section('content')
    <div class="auth">
        <div class="wrapper">
            <div class="auth--item">
                <h2>{{ $title }}</h2>
                <form method="post">
                    {{ csrf_field() }}
                    <div class="auth--row">
                        <span class="auth--tag">Логин</span>
                        <input class="input auth-input" type="text" name="login" value="{{ old('login') }}">
                        @if ($errors->has('login'))
                            <div class="danger"><span>{{ $errors->first('login') }}</span></div>
                        @endif
                    </div>
                    <div class="auth--row">
                        <span class="auth--tag">Пароль</span>
                        <input class="input auth-input" type="password" name="password">
                        @if ($errors->has('password'))
                            <div class="danger"><span>{{ $errors->first('password') }}</span></div>
                        @endif
                    </div>
                    <div class="auth--row">
                        <span class="auth--tag">Запомнить меня</span>
                        <input type="checkbox" class="auth-input" name="remember">
                    </div>
                    <input class="button" type="submit" value="Войти">
                    <a class="button" href="/">Отменить</a>
                    @if(session('authError'))
                        <div class="auth_danger">{{ session('authError') }}</div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection