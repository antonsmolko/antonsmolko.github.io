@extends('base')

@section('head')
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
@endsection

@section('header')
    <div class="wrapper">
        <div class="header__logo">
            <a href="/"><i class="header__icon icon--news"></i><span>Новости</span></a>
        </div>
        <div class="nav">
            @ability('super_admin', 'admin_access')
                <a class="button button-dark" href="{{ route('admin') }}">Панель администратора</a>
            @endability
            @if(Auth::check())
                <a class="button button-dark" href="{{ route('logout') }}">Выйти</a>
                <div class="user">
                    <h3><i class="header__icon icon--user"></i>{{ Auth::user()->name }}</h3>
                    @foreach(Auth::user()->roles as $role)
                        @if($role['name'])
                            <span class="role"> [ {{ $role['display_name'] }} ] </span>
                        @endif
                    @endforeach
                </div>

            @else
            <a class="button button-dark" href="{{ route('register') }}">Регистрация</a>
            <a class="button button-dark" href="{{ route('login') }}">Войти</a>
            <div class="user">
                <h3><i class="header__icon icon--user"></i>Гость</h3>
                <span class="role">Добро пожаловать!</span>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('content')
    @include($content)
@endsection

@section('footer')
    <div class="wrapper">
        <div class="footer__logo">
            <a href="/"><i class="footer__icon icon--news"></i><span>Новости</span></a>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="wrapper">
            <i class="icon--copyright"></i><span>2016 Все права защищены</span>
        </div>
    </div>
@endsection