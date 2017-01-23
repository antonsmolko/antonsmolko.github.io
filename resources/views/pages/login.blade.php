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
    // Пользователи
    <br><br>
    // login: tolik <br>
    // password: 123456 <br>
    // roles: SuperUser <br>

</div>