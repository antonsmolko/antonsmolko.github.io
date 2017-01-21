<div class="">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-parent"><a href="/administrator/users">Пользователи</a></li>
            <li class="uk-active"><a href="/administrator/roles">Роли</a></li>
            <li class="uk-parent"><a href="/administrator/blog">Блог</a></li>
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