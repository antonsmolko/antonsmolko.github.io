<div class="auth">
    <h2>{{ $title }}</h2>
    <form method="post">
        {{ csrf_field() }}
        <div class="auth-container">
            <span class="auth--tag">Логин</span>
            <input class="pages-iput" type="text" name="login" value="{{ $login }}">
            @if ($errors->has('login'))
                <div class="danger"><span>{{ $errors->first('login') }}</span></div>
            @endif
        </div>
        <div class="auth-container">
            <span class="auth--tag">Пароль</span>
            <input class="pages-iput" type="password" name="password" value="{{ $password }}">
            @if ($errors->has('password'))
                <div class="danger"><span>{{ $errors->first('password') }}</span></div>
            @endif
        </div>
        <div class="auth-container">
            <span class="auth--tag">Запомнить меня</span>
            <input type="checkbox" name="remember">
        </div>
        <input class="button" type="submit" value="Войти">
        <a class="button" href="/">Отменить</a>
        @if(session('authError'))
            <div class="auth_danger">{{ session('authError') }}</div>
        @endif
    </form>
</div>
<div class="note">
    Пользователи<br><br>
    <table border="0" cellpadding="5" width="400">
        <thead>
        <tr>
            <td>Логин</td>
            <td>Пароль</td>
            <td>Роль</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>smol</td>
            <td>qwerty</td>
            <td>super_admin</td>
        </tr>
        <tr>
            <td>tolik</td>
            <td>123456</td>
            <td>user</td>
        </tr>
        <tr>
            <td>mika</td>
            <td>qwerty</td>
            <td>article_admin</td>
        </tr>
        <tr>
            <td>vika</td>
            <td>222222</td>
            <td>user_admin</td>
        </tr>
        <tr>
            <td>terkin</td>
            <td>333333</td>
            <td>author</td>
        </tr>
        <tr>
            <td>ivan</td>
            <td>444444</td>
            <td>editor</td>
        </tr>
        </tbody>
    </table>
</div>