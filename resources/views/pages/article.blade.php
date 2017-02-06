@extends('pages.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="../css/article.css">
@endpush

@push('script')
    <script src="../js/article.js"></script>
@endpush

@section('header')
@endsection

@section('content')
    <div class="article">
        <div class="article-image" style="background-image: url('../{{ $article->image_full }}')">
            <h2>{{ $article->title }}</h2>
            <span class="new--dt note">
                {{ getRusDate($article->updated_at) }}
            </span>
            @if($author)
                <span class="article-author">
                    Автор статьи: {{ $author->name }}
                </span>
            @endif
        </div>
        <div class="article-content">

            <div class="new--body">
                <p>{!! $article['content'] !!}</p>
            </div>
            <div class="new--control">
                <a class="button" href="{{ route('index') }}">К списку новостей</a>
            </div>
        </div>
    </div>
@endsection