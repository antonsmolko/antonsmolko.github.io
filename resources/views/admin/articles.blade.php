<div class="">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            @ability(['super_admin', 'user_admin'], 'view_users')
            <li class="uk-parent"><a href="{{ route('admin.users') }}">Пользователи</a></li>
            @endability
            @ability('super_admin', 'create_edit_delete_roles')
            <li class="uk-parent"><a href="{{ route('admin.roles') }}">Роли</a></li>
            @endability
            @ability(['super_admin','article_admin', 'author', 'editor'], ['creare_articles', 'edit_articles', 'publish_articles', 'delete_articles'])
            <li class="uk-active"><a href="{{ route('admin.articles') }}">Блог</a></li>
            @endability
        </ul>
    </nav>
    <h2>Менеджер статей: список статей</h2>
    <div class="uk-grid uk-margin-top" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <form action="" method="post">
                {{ csrf_field() }}
                <a href="/administrator/articles/add" class="uk-button uk-button-primary">
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
                                @if($article['published'] == 1)
                                    <input type="checkbox" checked value="1" name="published">
                                @else
                                    <input type="checkbox" value="1" name="published">
                                @endif
                            </td>

                            <td>
                                <a href="/administrator/articles/edit/{{ $article['id'] }}">{{ $article['title'] }}</a>
                            </td>
                            <td>
                                @if(isset($author[$article['id']]))
                                    {{ $author[$article['id']][0] }}
                                @else
                                    Нет автора
                                @endif
                            </td>
                            <td>{{ $article['created_at'] }}</td>
                            <td>{{ $article['views'] }}</td>
                            <td>{{ $article['id'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>