@extends('base')

@section('head')
    <title>404</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="../css/errors.css">
@endpush

@section('header')
@endsection

@section('content')
    <div class="error">
        <div class="wrapper">
            <div class="error--item">
                <h1>ОШИБКА 403</h1>
                <span>Доступ запрещён!</span>
                <a class="button" href="{{ route('index') }}">На главную страницу</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection