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
            @if($article->published == 1)
                <div class="article">
                    <img src="{{ $article->image_thumb }}" alt="">
                    <div class="article-preview">
                        <h3>{{ $article->title }}</h3>
                        <span class="note">
                        {{ getRusDate($article->updated_at) }}
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
                </div>
            @endif
        @endforeach
    </div>
@endsection