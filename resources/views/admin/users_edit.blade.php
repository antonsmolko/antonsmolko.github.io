<div class="">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="">Пользователи</a></li>
            <li class="uk-parent"><a href="">Роли</a></li>
            <li class="uk-parent"><a href="">Блог</a></li>
        </ul>
    </nav>
    <h2>Менеджер пользователей: редактировать пользователя</h2>
    <form class="uk-form uk-form-horizontal" action="" method="post">
        {{ csrf_field() }}
        <fieldset data-uk-margin>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-in">Имя пользователя<sup>*</sup></label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-h-in" type="text"name="name" value="{{ $user['user_name'] }}">
                    @if ($errors->has('name'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-il">Логин пользователя<sup>*</sup></label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-il" type="text" name="login" value="{{ $user['user_login'] }}">
                    @if ($errors->has('login'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('login') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip">Пароль пользователя<sup>*</sup></label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-ip" type="password" name="password" value="{{ $user['user_password'] }}">
                    @if ($errors->has('password'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip2">Повтор пароля<sup>*</sup></label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-ip2" type="password" name="password2" value="{{ $user['user_password'] }}">
                    @if ($errors->has('password2'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('password2') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ie">E-mail пользователя<sup>*</sup></label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-ie" type="text" name="email" value="{{ $user['user_email'] }}">
                    @if ($errors->has('email'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

            </div>

            <div class="uk-form-row uk-form-select">
                <label class="uk-form-label" for="form-sr">Назначить роль</label>
                <div class="uk-form-controls">
                    <select class="uk-form-width-medium" id="form-sr">
                        <option value="{{ $user['user_role'] or '' }}"></option>
                        {{--@foreach($roles as $role)--}}
                        {{--<option value="{{ $role['id'] }}">{{ $role['name'] }}</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ia">Активировать</label>
                <div class="uk-form-controls">
                    <input id="form-ia" type="checkbox" name="activate" value="1" value="{{ $user['user_activate'] or ''}}">
                </div>
            </div>
            <button class="uk-button uk-button-primary" type="submit">
                <i class="uk-icon-plus"></i>
                Сохранить</button>
            <a href="/administrator/users" class="uk-button">
                <i class="uk-icon-remove"></i>
                Отменить
            </a>
        </fieldset>
    </form>
</div>