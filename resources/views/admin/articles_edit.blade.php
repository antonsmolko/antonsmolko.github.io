@extends('admin.main')

@section('content')
    <h2>Менеджер статей: редактировать статью</h2>
    <form class="uk-form uk-form-horizontal" enctype="multipart/form-data" action="" method="post">
        {{ csrf_field() }}
        <fieldset data-uk-margin>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-in">Название статьи</label>
                <div class="uk-form-controls">
                    <input class="uk-width-1-1" id="form-h-in" type="text" name="title" value="{{ $article->title }}">
                    @if ($errors->has('title'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-td">Содержание статьи</label>
                <div class="uk-form-controls">
                    <textarea data-uk-htmleditor class="" id="form-h-td" type="text" name="content">{{ $article->content }}</textarea>
                    @if ($errors->has('content'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('content') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-if">Выбирите изображение</label>
                <div class="uk-form-controls">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                    <input type="file" name="image" id="form-h-if">
                    @if ($errors->has('image'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('image') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip">Опубликовать</label>
                <div class="uk-form-controls">
                    @if($article->published == 1)
                        <input id="form-ip" type="checkbox" name="publish" value="1" checked>
                    @else
                        <input id="form-ip" type="checkbox" name="publish" value="1">
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-ia">Автор статьи</label>
                <div class="uk-form-controls">
                    @if(!$article->author[0]->name)
                        <input class="uk-form-width-medium" type="text" id="form-h-ia" name="" value="{{ Auth::user()->name }}" disabled>
                    @else
                        <input class="uk-form-width-medium" type="text" id="form-h-ia" name="" value="{{ $article->author[0]->name }}" disabled>
                    @endif
                </div>
            </div>
        </fieldset>
        @if(!$article->author[0]->name)
            <input type="hidden" name="authorId" value="{{ Auth::user()->id }}">
        @else
            <input type="hidden" name="authorId" value="{{ $article->author[0]->id }}">
        @endif
        <div class="uk-margin-top">
            <button class="uk-button uk-button-primary" type="submit"><i class="uk-icon-plus"></i>Сохранить</button>
            <a href="{{ route('admin.articles') }}" class="uk-button"><i class="uk-icon-remove"></i>Отменить</a>
        </div>
    </form>
@endsection