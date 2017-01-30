@extends('pages.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="../css/articles.css">
@endpush
@push('script')
    <script src="../js/articles.js"></script>
@endpush

@section('header')
@endsection

@section('content')
    @foreach($articles as $article)
        <div class="article">
            <div class="article-preview">
                <h2>{{ $article->title }}</h2>
                <span class="note">
                    {{ getRusDate($article->updated_at) }}
                </span>
                @if($author)
                    <span class="article-author">Автор статьи: {{ $author[$article->id]->name }}</span>
                @endif
                <div class="article-text">
                    <p>
                        {!! cutText($article->content) !!}
                    </p>
                </div>
                <a class="button" href="{{ route('article', ['id' => $article->id]) }}">Подробнее</a>
            </div>
            <div class="article-image" style="background-image: url('../images/articles/002.jpg')">
            </div>
        </div>
    @endforeach
@endsection