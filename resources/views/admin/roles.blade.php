<div class="">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            @ability(['super_admin', 'user_admin'], 'view_users')
            <li class="uk-parent"><a href="{{ route('admin.users') }}">Пользователи</a></li>
            @endability
            @ability('super_admin', 'create_edit_delete_roles')
            <li class="uk-active"><a href="{{ route('admin.roles') }}">Роли</a></li>
            @endability
            @ability(['super_admin','article_admin', 'author', 'editor'], ['creare_articles', 'edit_articles', 'publish_articles', 'delete_articles'])
            <li class="uk-parent"><a href="{{ route('admin.articles') }}">Блог</a></li>
            @endability
        </ul>
    </nav>
    <h2>Менеджер ролей: список ролей</h2>
    <div class="uk-grid uk-margin-top" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <form action="" method="post">
                {{ csrf_field() }}
                <a href="/administrator/roles/add" class="uk-button uk-button-primary">
                    <i class="uk-icon-plus"></i>
                    Создать
                </a>
                <button type="submit" class="uk-button" name="edit">
                    <i class="uk-icon-edit"></i>
                    Изменить
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
                        <th>Название</th>
                        <th>Алиас</th>
                        <th>Описание</th>
                        <th>ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                <a href="/administrator/roles/edit/{{ $role['id'] }}">{{ $role['display_name'] }}</a>
                            </td>
                            <td>{{ $role['name'] }}</td>
                            <td>{{ $role['description'] }}</td>
                            <td>{{ $role['id'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>