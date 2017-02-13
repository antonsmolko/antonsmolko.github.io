@extends('admin.main')

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
    <script src="../js/admin.articles.js"></script>
@endpush

@section('content')
    <h2>Менеджер статей: список статей</h2>
        <div class="uk-grid uk-margin-top" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <form action="" method="post">
                    {{ csrf_field() }}
                    @can('create', \App\Models\Article::class)
                        <a href="{{ route('admin.articles.create') }}" class="uk-button uk-button-primary">
                            <i class="uk-icon-plus"></i>Создать
                        </a>
                    @endcan
                    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Заголовок</th>
                            <th>Состояние</th>
                            <th>Автор</th>
                            <th>Дата</th>
                            <th>Просмотры</th>
                            <th>ID</th>
                            <th>Удаление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($articles as $article)
                            <tr>
                                <td>{!! $i++ !!}</td>
                                <td>
                                    @can('edit', \App\Models\Article::class)
                                        <a href="{{ route('admin.articles.edit', ['id' => $article->id]) }}">{{ $article->title }}</a>
                                    @endcan
                                    @cannot('edit', \App\Models\Article::class)
                                        <span>{{ $article->title }}</span>
                                    @endcannot
                                </td>
                                <td>
                                    <div class="activate us uk-button-group" id="{{ $article->id }}">
                                    @if($article->published == 1)
                                        @can('publish', \App\Models\Article::class)
                                            <button class="uk-button uk-active button-on"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button button-off"><i class="uk-icon-ban"></i></button>
                                        @endcan
                                        @cannot('publish', \App\Models\Article::class)
                                            <button class="uk-button uk-active" disabled><i class="uk-icon-check"></i></button>
                                        @endcannot
                                    @else
                                        @can('publish', \App\Models\Article::class)
                                            <button class="uk-button button-on"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-active button-off"><i class="uk-icon-ban"></i></button>
                                        @endcan
                                        @cannot('publish', \App\Models\Article::class)
                                                <button class="uk-button uk-active" disabled><i class="uk-icon-ban"></i></button>
                                        @endcannot
                                    @endif
                                    </div>
                                </td>
                                <td>
                                    @if(isset($article->author[0]->name))
                                        {{ $article->author[0]->name }}
                                    @else
                                        Нет автора
                                    @endif
                                </td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->views }}</td>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <div class="delete" id="{{ $article->id }}">
                                        @can('delete', \App\Models\Article::class)
                                            <button class="uk-button uk-button-danger"><i class="uk-icon-close"></i></button>
                                        @endcan
                                        @cannot('delete', \App\Models\Article::class)
                                            <button class="uk-button" disabled><i class="uk-icon-close"></i></button>
                                        @endcannot
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script>
        var url_activate = '{{ route('api.article.activate') }}';
        var url_delete = '{{ route('api.article.delete') }}';
    </script>
@endsection