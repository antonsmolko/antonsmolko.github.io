@extends('admin.main')

@push('script')
<script src="../js/admin.users.js"></script>
@endpush

@section('content')
    <h2>Менеджер пользователей: редактировать пользователя</h2>
    <form class="uk-form uk-form-horizontal" action="" method="post">
        {{ csrf_field() }}
        <fieldset data-uk-margin>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-in">Имя пользователя</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-h-in" type="text"name="name" value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-il">Логин пользователя</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-il" type="text" name="login" value="{{ $user->login }}">
                    @if ($errors->has('login'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('login') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip">Пароль пользователя</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-ip" type="password" name="password" value="">
                    @if ($errors->has('password'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip2">Повтор пароля</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-ip2" type="password" name="password2" value="">
                    @if ($errors->has('password2'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('password2') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ie">E-mail пользователя</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-ie" type="text" name="email" value="{{ $user->email }}">
                    @if ($errors->has('email'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

            </div>

            <div class="uk-form-row uk-form-select">
                <label class="uk-form-label" for="form-sr">Назначить роль</label>
                <div class="uk-form-controls">
                    <select class="uk-form-width-medium" id="form-sr" name="roleId">
                        @if(!isset($user->role[0]->display_name))
                            <option value="" selected>Не назначена</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                            @endforeach
                        @else
                            <option value="">Не назначена</option>
                            @foreach($roles as $role)
                                @if($user->role[0]->display_name == $role->display_name)
                                    <option value="{{ $role->id }}" selected>{{ $role->display_name }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ia">Активировать</label>
                <div class="uk-form-controls">
                    @if($user->login == SUPER_ADMIN_LOGIN)
                        <input id="form-ia" type="checkbox" name="activate" value="1" checked disabled>
                    @elseif($user->activate == 1 && $user->login != SUPER_ADMIN_LOGIN)
                        <input id="form-ia" type="checkbox" name="activate" checked value="1">
                    @else
                        <input id="form-ia" type="checkbox" name="activate" value="1">
                    @endif
                </div>
            </div>
            @if($user->login == SUPER_ADMIN_LOGIN)
                <a href="{{ route('admin.users') }}" class="uk-button"><i class="uk-icon-arrow-left"></i>Назад</a>
            @else
                <button class="uk-button uk-button-primary" type="submit"><i class="uk-icon-plus"></i>Сохранить</button>
                <a href="{{ route('admin.users') }}" class="uk-button"><i class="uk-icon-remove"></i>Отменить</a>
            @endif
        </fieldset>
    </form>
@endsection