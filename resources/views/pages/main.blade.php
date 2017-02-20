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
                @can('isAdmin', Auth::user())
                    <a class="button button--nav" href="{{ route('admin') }}">Панель администратора</a>
                @endcan
                @if(Auth::check())
                    <a class="button button--nav" href="{{ route('logout') }}">Выйти</a>
                    <div class="user">
                        <h3><i class="icon--user"></i>{{ Auth::user()->name }}</h3>
                        @if(isset(Auth::user()->role[0]->name))
                            <span class="role">[ {{ Auth::user()->role[0]->display_name }} ]</span>
                        @else
                            <span class="role">Добро пожаловать!</span>
                        @endif
                    </div>
                @else
                    <a class="button button--nav" href="{{ route('register') }}">Регистрация</a>
                    <a class="button button--nav" href="{{ route('login') }}">Войти</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <div class="wrapper">
        <div class="footer--item">
            <div class="footer--logo">
                <a href="{{ route('index') }}">
                    <img src="/images/logo/logo-footer.svg" alt="">
                </a>
            </div>
            <div class="footer--copyright">
                <i class="icon--copyright"></i><span>2016 Все права защищены</span>
            </div>
        </div>
    </div>
@endsection