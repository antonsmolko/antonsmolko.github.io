@extends('pages.main')

@push('styles')
    <link rel="stylesheet" type="text/css" href="../css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../css/articles.css">
@endpush
@push('script')
    {{--<script src="../js/require.min.js"></script>--}}
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
                        <h2>{{ $articleLast->title }}</h2>
                        <span class="article-last--dt">{{ getRusDate($articleLast->updated_at) }}</span>
                        @if(isset($articleLast->author[0]->name))
                            <span class="article-last--author">Автор статьи: {{ $articleLast->author[0]->name }}</span>
                        @endif
                        <div class="article-last--text">
                            <p>
                                {!! cutText($articleLast->content) !!}
                            </p>
                        </div>
                        <a class="button" href="{{ route('article', ['id' => $articleLast->id]) }}">Подробнее</a>
                    </div>
                    @if(file_exists($articleLast->image_thumb))
                        <a class="article-last--image" href="{{ route('article', ['id' => $articleLast->id]) }}" style="background-image: url('../{{ $articleLast->image_thumb }}');">
                    @else
                        <a class="article-last--image" href="{{ route('article', ['id' => $articleLast->id]) }}" style="background-image: url('http://placehold.it/600x400');">
                    @endif
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="articles-list">
        <div class="wrapper">
            <div class="articles-list--item">
                @forelse($articles as $key => $article)
                    <div class="article" data-wow-offset="10">
                        <a class="article-image" href="{{ route('article', ['id' => $article->id]) }}">
                            @if(file_exists($article->image_thumb))
                                <img src="{{ $article->image_thumb }}" alt="">
                            @else
                                <img src="http://placehold.it/600x400" alt="">
                            @endif
                        </a>
                        <div class="article--title">
                            <a href="{{ route('article', ['id' => $article->id]) }}">
                                <h3>{{ $article->title }}</h3>
                            </a>
                            @if(isset($articleLast->author[0]->name))
                                <span class="article--author">Автор статьи: {{ $articleLast->author[0]->name }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>Нет статей для отображения</p>
                @endforelse
            </div>
            {{ $articles->links() }}
        </div>
    </div>
@endsection