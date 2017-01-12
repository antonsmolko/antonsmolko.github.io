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
            {{--@if($auth)--}}
                {{--@if ($add_edit)--}}
                    <a class="button button-dark" href="/add">Добавить статью</a>
                {{--@endif--}}
            {{--<a class="button button-dark" href="/logout">Выйти</a>--}}
            {{--<div class="user">--}}
                {{--<h3><i class="header__icon icon--user"></i>{{ $user_name }}</h3>--}}
                {{--@foreach ($user_roles as $role)--}}
                    {{--@if(!in_array($role, $roles))--}}
                        {{--<span class="role"> [ {{ $role or '' }} ] </span>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</div>--}}
            {{--@else--}}
            <a class="button button-dark" href="/login">Войти</a>
            <div class="user">
                <h3><i class="header__icon icon--user"></i>Гость</h3>
                <span class="role">Добро пожаловать!</span>
            </div>
            {{--@endif--}}
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