@extends('base')

@section('head')
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/uikit.gradient.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/codemirror/codemirror.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/uikit.js"></script>

    <!-- Codemirror and marked dependencies -->
    <script src="/js/codemirror/codemirror.js"></script>
    <script src="/js/codemirror/markdown.js"></script>
    <script src="/js/codemirror/overlay.js"></script>
    <script src="/js/codemirror/xml.js"></script>
    <script src="/js/codemirror/gfm.js"></script>
    <script src="/js/marked/marked.min.js"></script>
    <script src="/js/scripts.js"></script>

    <!-- HTML editor CSS and JavaScript -->
    <link rel="stylesheet" href="/css/htmleditor.gradient.min.css">
    <script src="/js/htmleditor.min.js"></script>
@endsection

@section('header')
    <div class="wrapper">
        <div class="header__logo">
            <a href="/"><i class="header__icon icon--news"></i><span>Новости</span></a>
        </div>
        <div class="nav">
            <div class="user">
                <h3><i class="header__icon icon--user"></i>Гость</h3>
                <span class="role">Добро пожаловать!</span>
            </div>
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


@push('scripts')
    <script src="../js/uikit.js"></script>
@endpush

@push('styles_uikit')
    <link rel="stylesheet" type="text/css" href="../css/uikit.gradient.css">
@endpush