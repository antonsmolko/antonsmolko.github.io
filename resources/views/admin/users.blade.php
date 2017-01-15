<div class="uk-container uk-container-center">
    <table class="uk-table">
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
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['login'] }}</td>
                <td>
                    @if($user['login'] == 'smol')
                        <input type="checkbox" checked disabled>
                    @elseif($user['activate'] == 1 && $user['login'] != 'smol')
                        <input type="checkbox" checked>
                    @else
                        <input type="checkbox">
                    @endif
                <td>Role?</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['last_visit_at'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td>{{ $user['id'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>