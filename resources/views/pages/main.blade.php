@extends('base')

@section('head')
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@endsection

@push('mane_script')
    <script src="../js/jquery.min.js"></script>
@endpush

@section('header')
    <div class="wrapper">
        <div class="header--item">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="/images/logo/logo.svg" alt="">
                </a>
            </div>
            <div class="header--nav">
                @ability('super_admin', 'admin_access')
                <a class="button button--nav" href="{{ route('admin') }}">Панель администратора</a>
                @endability
                @if(Auth::check())
                    <a class="button button--nav" href="{{ route('logout') }}">Выйти</a>
                    <div class="user">
                        <h3><i class="icon--user"></i>{{ Auth::user()->name }}</h3>
                        @foreach(Auth::user()->roles as $role)
                            @if($role['name'])
                                <span class="role"> [ {{ $role['display_name'] }} ] </span>
                            @endif
                        @endforeach
                    </div>
                @else
                    <a class="button button--nav" href="{{ route('register') }}">Регистрация</a>
                    <a class="button button--nav" href="{{ route('login') }}">Войти</a>
                    <div class="user">
                        <h3><i class="icon--user"></i>Гость</h3>
                        <span class="role">Добро пожаловать!</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="wrapper">
        <div class="footer-logo">
            <a href="{{ route('index') }}"></a>
        </div>
        <div class="copyright">
            <i class="icon--copyright"></i><span>2016 Все права защищены</span>
        </div>
    </div>
@endsection