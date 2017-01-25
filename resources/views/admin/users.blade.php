<h2>Менеджер пользователей: список пользователей</h2>
<div class="uk-grid uk-margin-top" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <form action="" method="post">
            {{ csrf_field() }}
            <a href="{{ route('admin.users.create') }}" class="uk-button uk-button-primary">
                <i class="uk-icon-plus"></i>
                Создать
            </a>
            <button type="submit" class="uk-button" name="edit">
                <i class="uk-icon-edit"></i>
                Изменить
            </button>
            <button type="submit" class="uk-button" name="activate">
                <i class="uk-icon-check"></i>
                Активировать
            </button>
            <button type="submit" class="uk-button" name="block">
                <i class="uk-icon-ban"></i>
                Блокировать
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
                    <th>Имя</th>
                    <th>Логин</th>
                    <th>Активация</th>
                    <th>Роль</th>
                    <th>E-mail</th>
                    <th>Дата последнего входа</th>
                    <th>Дата регистрации</th>
                    <th>ID</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>
                            <a href="/administrator/users/edit/{{ $user['id'] }}">{{ $user['name'] }}</a>
                        </td>
                        <td>{{ $user['login'] }}</td>
                        <td>
                            @if($user['login'] == 'smol')
                                <input type="checkbox" checked disabled>
                            @elseif($user['activate'] == 1 && $user['login'] != SUPER_ADMIN)
                                <input type="checkbox" checked>
                            @else
                                <input type="checkbox">
                            @endif
                        </td>
                        <td>
                            @if(isset($roles[$user['id']]))
                                {{ $roles[$user['id']][0] }}
                            @else
                                Не назначена
                            @endif
                        </td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['last_visit_at'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        <td>{{ $user['id'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>