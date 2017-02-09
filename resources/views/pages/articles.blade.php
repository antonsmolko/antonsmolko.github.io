@extends('pages.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="../css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../css/articles.css">
@endpush
@push('script')
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/imagefill.js"></script>
    <script src="../js/masonry.pkgd.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/articles.js"></script>
@endpush

@section('header')
@endsection

@section('content')
    <div class="articles-list">
        @foreach($articles as $article)
            <div class="article" data-wow-offset="10">
                <a class="article-image" href="{{ route('article', ['id' => $article->id]) }}">
                    @if(file_exists($article->image_thumb))
                        <img src="{{ $article->image_thumb }}" alt="">
                    @else
                        <img src="http://placehold.it/600x400" alt="">
                    @endif
                </a>
                <div class="article-preview">
                    <h3>{{ $article->title }}</h3>
                    <span class="note">
                    {{ getRusDate($article->updated_at) }}
                        @if($article->author[0]->name)
                            <span class="article-author">Автор статьи: {{ $article->author[0]->name }}</span>
                        @endif
                        <div class="article-text">
                    <p>
                        {!! cutText($article->content) !!}
                    </p>
                </div>
                <a class="button" href="{{ route('article', ['id' => $article->id]) }}">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection