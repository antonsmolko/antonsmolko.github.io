<div class="auth">
    <h2>Авторизация</h2>
    <form method="post">
        <div class="auth--login">
            <span class="auth--tag">Логин</span>
            <input class="auth--text" type="text" name="login" value="{{ $login }}">
        </div>
        <div class="auth--password">
            <span class="auth--tag">Пароль</span>
            <input class="auth--text" type="text" name="password" value="{{ $password }}">
        </div>
        <div class="auth--remember">
            <span class="auth--tag">Запомнить меня</span>
            <input type="checkbox" name="remember">
        </div>
        <a class="button" href="/">Отменить</a>
        <input class="button" type="submit" value="Войти">
    </form>
    @if(!empty($errors))
        @foreach($errors as $field => $text)
            <div class="danger">
                <span>
                    @if ($field !== 0)
                        {{ $field }} {{ $text }}
                    @endif
                </span>
            </div>
        @endforeach
    @endif
    @if (!empty($loginError))
        <div class="danger">
            <span>{{ $loginError }}</span>
        </div>
    @endif
</div>
<div class="note">
    // Пользователи
    <br><br>
    // Вася Пупкин <br>
    // login: pupkin <br>
    // password: 123456 <br>
    // roles: user <br>
    // permissions: user.view_articles <br><br>

    // Геннадий Ветров <br>
    // login: genadi <br>
    // password: vetrov <br>
    // roles: user, editor <br>
    // permissions: user.view_articles, editor.add_edit <br><br>

    // Игорь Игоревич <br>
    // login: igorek <br>
    // password: qwerty <br>
    // roles: user, moderator <br>
    // permissions: user.view_articles, moderator.delete_articles, moderator.approve_articles, moderator.discard_articles
    <br><br>

    // Виктория Викторовна <br>
    // login: vikki <br>
    // password: tortik <br>
    // roles: user, editor, admin <br>
    // permissions: user.view_articles, editor.add_edit, admin.edit_users <br><br>

    // Сергей Пронин <br>
    // login: gopro <br>
    // password: pronin <br>
    // roles: user, editor <br>
    // permissions: user.view_articles, editor.add_edit <br><br>
</div>