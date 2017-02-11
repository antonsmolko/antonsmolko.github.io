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

@section('content')
    <div class="article-last">
        <div class="wrapper">
            <div class="article-last--item">
                @if($articleLast)
                    <div class="article-last--description">
                        <h3>{{ $articleLast->title }}</h3>
                        <span class="note">{{ getRusDate($articleLast->updated_at) }}</span>
                        @if($articleLast->author[0]->name)
                            <span class="article-author">Автор статьи: {{ $articleLast->author[0]->name }}</span>
                        @endif
                        <div class="article-last--text">
                            <p>
                                {!! cutText($articleLast->content) !!}
                            </p>
                        </div>
                        <a class="button" href="{{ route('article', ['id' => $articleLast->id]) }}">Подробнее</a>
                    </div>
                    <a class="article-last--image" href="{{ route('article', ['id' => $articleLast->id]) }}">
                        @if(file_exists($articleLast->image_thumb))
                            <img src="{{ $articleLast->image_thumb }}" alt="">
                        @else
                            <img src="http://placehold.it/600x400" alt="">
                        @endif
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="articles-list">
        <div class="wrapper">
            <div class="articles-list articles-list--item">
                @foreach($articles as $article)
                    <div class="article" data-wow-offset="10">
                        <a class="article-image" href="{{ route('article', ['id' => $article->id]) }}">
                            @if(file_exists($article->image_thumb))
                                <img src="{{ $article->image_thumb }}" alt="">
                            @else
                                <img src="http://placehold.it/600x400" alt="">
                            @endif
                        </a>
                        <div class="article-description">
                            <h3>{{ $article->title }}</h3>
                            <span class="note">{{ getRusDate($article->updated_at) }}</span>
                            @if($article->author[0]->name)
                                <span class="article-author">Автор статьи: {{ $article->author[0]->name }}</span>
                            @endif
                            <a class="button" href="{{ route('article', ['id' => $article->id]) }}">Подробнее</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection