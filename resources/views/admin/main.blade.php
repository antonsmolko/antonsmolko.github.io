@extends('base')

@section('head')
    <title>{{ $title or '' }}</title>
    <meta charset="utf-8">
    {{--<link rel="stylesheet" type="text/css" href="../css/styles.css">--}}
    <link rel="stylesheet" type="text/css" href="../css/uikit.gradient.css">
    <script src="../js/uikit.js"></script>
@endsection

@section('header')
    <div class="uk-container uk-container-center">
        <a href="" class="uk-navbar-brand">Brand</a>
        <nav class="uk-navbar">
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="">Блог</a></li>
                <li class="uk-parent"><a href="">Пользователи</a></li>
                <li class="uk-parent"><a href="">Роли</a></li>
            </ul>
        </nav>
    </div>
@endsection

@section('content')
    @include($content)
@endsection

@section('footer')
@endsection
    </div>

@push('scripts')
    <script src="../js/uikit.js"></script>
@endpush

@push('styles_uikit')
    <link rel="stylesheet" type="text/css" href="../css/uikit.gradient.css">
@endpush