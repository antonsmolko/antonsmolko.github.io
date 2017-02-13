@extends('pages.main')

@push('styles')
<link rel="stylesheet" type="text/css" href="../css/article.css">
@endpush

@push('script')
<script src="../js/article.js"></script>
@endpush



@section('content')
    <div class="article">
        <div class="wrapper">
            <div class="article--item">
                @if(file_exists($article->image_full))
                    <div class="article--image" style="background-image: url('../{{ $article->image_full }}')">
                @else
                    <div class="article--image" style="background-image: url('http://placehold.it/2500x1500')">
                @endif
                <h2>{{ $article->title }}</h2>
                <span class="article--dt">{{ getRusDate($article->updated_at) }}</span>
                @if($article->author[0]->name)
                    <span class="article--author">Автор статьи: {{ $article->author[0]->name }}</span>
                @endif
                </div>
                <div class="article--content">
                    <div class="article--text">
                        {!! $article['content'] !!}
                    </div>
                    <a class="button" href="{{ route('index') }}">К списку новостей</a>
                </div>
            </div>
        </div>
    </div>
@endsection