@extends('admin.main')

@section('content')
    <h2>Менеджер ролей: создать роль</h2>
    <form class="uk-form uk-form-horizontal" action="" method="post">
        {{ csrf_field() }}
        <fieldset data-uk-margin>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-in">Название роли</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-h-in" type="text" name="role_name" value="{{ old('role_name') }}">
                    @if ($errors->has('role_name'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('role_name') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-ia">Алиас</label>
                <div class="uk-form-controls">
                    <input class="uk-form-width-medium" id="form-h-ia" type="text" name="role_alias" value="{{ old('role_alias') }}">
                    @if ($errors->has('role_alias'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('role_alias') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-td">Описание</label>
                <div class="uk-form-controls">
                    <textarea class="uk-form-width-medium" cols="30" rows="5" id="form-h-td" type="text" name="role_description">{{ old('role_description') }}</textarea>
                    @if ($errors->has('role_description'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('role_description') }}</div>
                    @endif
                </div>
            </div>
        </fieldset>
        <fieldset class="uk-margin-top" data-uk-margin>
            <legend>Назначить привилегии</legend>
                @foreach($permissions as $permission)
                    <div class="uk-form-row">
                        <label class="uk-form-label" style="width: 400px" for="form-p-{{ $permission->id }}">
                            <a href="#modal-{{ $permission->id }}" data-uk-modal title="{{ $permission->description }}">{{ $permission->display_name }}</a>
                            <div id="modal-{{ $permission->id }}" class="uk-modal" aria-hidden="true" style="display: none; overflow-y: auto;">
                                <div class="uk-modal-dialog">
                                    <a href="" class="uk-modal-close uk-close"></a>
                                    <p>{{ $permission->description }}</p>
                                </div>
                            </div>
                        </label>
                        <div class="uk-form-controls">
                            <input id="form-p{{ $permission->id }}" type="checkbox" name="{{ $permission->name }}" value="1" {{ old($permission->name) ? 'checked' : '' }}>
                        </div>
                    </div>
                @endforeach
        </fieldset>
        <div class="uk-margin-top">
            <button class="uk-button uk-button-primary" type="submit" ><i class="uk-icon-plus"></i>Создать</button>
            <a href="{{ route('admin.roles') }}" class="uk-button"><i class="uk-icon-remove"></i>Отменить</a>
        </div>
    </form>
@endsection