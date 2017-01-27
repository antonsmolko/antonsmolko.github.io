<h2>Менеджер статей: редактировать статью</h2>
<form class="uk-form uk-form-horizontal" action="" method="post">
    {{ csrf_field() }}
    <fieldset data-uk-margin>
        <div class="uk-form-row">
            <label class="uk-form-label" for="form-h-in">Название статьи<sup>*</sup></label>
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
                <textarea data-uk-htmleditor="" class="" id="form-h-td" type="text" name="content">{{ $article->content }}</textarea>
                @if ($errors->has('content'))
                    <div class="uk-badge uk-badge-danger">{{ $errors->first('content') }}</div>
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
                @if(!$author)
                    <input class="uk-form-width-medium" type="text" id="form-h-ia" name="" value="{{ Auth::user()->name }}" disabled>
                @else
                    <input class="uk-form-width-medium" type="text" id="form-h-ia" name="" value="{{ $author->name }}" disabled>
                @endif
            </div>
        </div>
    </fieldset>
    @if(!$author)
        <input type="hidden" name="author" value="{{ Auth::user()->id }}">
    @else
        <input type="hidden" name="author" value="{{ $author->id }}">
    @endif
    <div class="uk-margin-top">
        <button class="uk-button uk-button-primary" type="submit"><i class="uk-icon-plus"></i>Сохранить</button>
        <a href="{{ route('admin.articles') }}" class="uk-button"><i class="uk-icon-remove"></i>Отменить</a>
    </div>
</form>