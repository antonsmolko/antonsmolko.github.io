@extends('admin.main')

@section('content')
    <h2>Менеджер статей: список статей</h2>
        <div class="uk-grid uk-margin-top" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <a href="{{ route('admin.articles.create') }}" class="uk-button uk-button-primary">
                        <i class="uk-icon-plus"></i>
                        Создать
                    </a>
                    <button type="submit" class="uk-button" name="edit">
                        <i class="uk-icon-edit"></i>
                        Изменить
                    </button>
                    <button type="submit" class="uk-button" name="publish">
                        <i class="uk-icon-check"></i>
                        Опубликовать
                    </button>
                    <button type="submit" class="uk-button" name="unpublish">
                        <i class="uk-icon-ban"></i>
                        Снять с публикации
                    </button>
                    <button type="submit" class="uk-button" name="delete">
                        <i class="uk-icon-remove"></i>
                        Удалить
                    </button>
                    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox">
                            </th>
                            <th>Состояние</th>
                            <th>Заголовок</th>
                            <th>Автор</th>
                            <th>Дата</th>
                            <th>Количество просмотров</th>
                            <th>ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    @if($article->published == 1)
                                        <input type="checkbox" checked value="1" name="published">
                                    @else
                                        <input type="checkbox" value="1" name="published">
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.articles.edit', ['id' => $article->id]) }}">{{ $article->title }}</a>
                                </td>
                                <td>
                                    @if(isset($author[$article->id]))
                                        {{ $author[$article->id]->name }}
                                    @else
                                        Нет автора
                                    @endif
                                </td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->views }}</td>
                                <td>{{ $article->id }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection