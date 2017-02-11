@extends('admin_base')

@section('head')
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/uikit.gradient.css">
    <link rel="stylesheet" type="text/css" href="/css/codemirror/codemirror.css">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/uikit.js"></script>

    <!-- Codemirror and marked dependencies -->
    <script src="/js/codemirror/codemirror.js"></script>
    <script src="/js/codemirror/markdown.js"></script>
    <script src="/js/codemirror/overlay.js"></script>
    <script src="/js/codemirror/xml.js"></script>
    <script src="/js/codemirror/gfm.js"></script>
    <script src="/js/marked/marked.min.js"></script>

    <!-- HTML editor CSS and JavaScript -->
    <link rel="stylesheet" href="/css/htmleditor.gradient.min.css">
    <script src="/js/htmleditor.min.js"></script>
@endsection

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
                        @foreach(Auth::user()->roles as $key)
                            @if($key->name)
                                <span class="role"> [ {{ $key->display_name }} ] </span>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('admin_navbar')
    <nav class="uk-navbar uk-width-1-1">
        <ul class="uk-navbar-nav">
            @ability(['super_admin', 'user_admin'], 'view_users')
            <li class="uk-parent" id="users"><a href="{{ route('admin.users') }}">Пользователи</a></li>
            @endability
            @ability('super_admin', 'create_edit_delete_roles')
            <li class="uk-parent" id="roles"><a href="{{ route('admin.roles') }}">Роли</a></li>
            @endability
            @ability(['super_admin','article_admin', 'author', 'editor'], ['creare_articles', 'edit_articles', 'publish_articles', 'delete_articles'])
            <li class="uk-parent" id="articles"><a href="{{ route('admin.articles') }}">Блог</a></li>
            @endability
        </ul>
    </nav>
@endsection

@section('content')
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