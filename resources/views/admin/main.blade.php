@extends('admin_base')

@section('head')
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/uikit.gradient.css">
    <link rel="stylesheet" type="text/css" href="/css/codemirror/codemirror.css">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">

    <!-- HTML editor CSS -->
    <link rel="stylesheet" href="/css/htmleditor.gradient.min.css">
@endsection

@push('script')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/uikit.js"></script>

    <!-- Codemirror and marked dependencies -->
    <script src="/js/codemirror/codemirror.js"></script>
    <script src="/js/codemirror/markdown.js"></script>
    <script src="/js/codemirror/overlay.js"></script>
    <script src="/js/codemirror/xml.js"></script>
    <script src="/js/codemirror/gfm.js"></script>
    <script src="/js/marked/marked.min.js"></script>

    <!-- HTML JavaScript -->
    <script src="/js/htmleditor.min.js"></script>
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
                @if(Auth::check())
                    <a class="button button--nav" href="{{ route('logout') }}">Выйти</a>
                    <div class="user">
                        <h3><i class="header__icon icon--user"></i>{{ Auth::user()->name }}</h3>
                        <span class="role"> [ {{ Auth::user()->role[0]->display_name }} ] </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('admin_navbar')
    <nav class="uk-navbar uk-width-1-1">
        <ul class="uk-navbar-nav">
            @can('rule', \App\Models\User::class)
            <li class="uk-parent" id="users"><a href="{{ route('admin.users') }}">Пользователи</a></li>
            @endcan
            @can('rule', \App\Models\Role::class)
            <li class="uk-parent" id="roles"><a href="{{ route('admin.roles') }}">Роли</a></li>
            @endcan
            @can('rule', \App\Models\Article::class)
            <li class="uk-parent" id="articles"><a href="{{ route('admin.articles') }}">Блог</a></li>
            @endcan
        </ul>
    </nav>
@endsection

@section('content')
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