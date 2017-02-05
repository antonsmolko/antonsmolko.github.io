@extends('admin.main')

@section('content')
    <h2>Менеджер статей: создать статью</h2>
    <form class="uk-form uk-form-horizontal" enctype="multipart/form-data" action="" method="post">
        {{ csrf_field() }}
        <fieldset data-uk-margin>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-in">Название статьи</label>
                <div class="uk-form-controls">
                    <input class="uk-width-1-1" id="form-h-in" type="text" name="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-td">Содержание статьи</label>
                <div class="uk-form-controls">
                    <textarea data-uk-htmleditor class="" id="form-h-td" type="text" name="content">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('content') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-if">Выбирите изображение</label>
                <div class="uk-form-controls">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                    <input type="file" name="file" id="form-h-if" value="{{ old('file') }}">
                    @if ($errors->has('content'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('file') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip">Опубликовать</label>
                <div class="uk-form-controls">
                    <input id="form-ip" type="checkbox" name="publish" value="1">
                </div>
            </div>
            <input type="hidden" name="author" value="{{ $author->id }}">
        </fieldset>
        <div class="uk-margin-top">
            <button class="uk-button uk-button-primary" type="submit"><i class="uk-icon-plus"></i>Создать</button>
            <a href="{{ route('admin.articles') }}" class="uk-button"><i class="uk-icon-remove"></i>Отменить</a>
        </div>
    </form>
@endsection