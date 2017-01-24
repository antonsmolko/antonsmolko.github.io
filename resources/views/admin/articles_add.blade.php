<div class="">
    <nav class="uk-navbar">
        <ul class="uk-navbar-nav">
            @ability(['super_admin', 'user_admin'], 'view_users')
            <li class="uk-parent"><a href="{{ route('admin.users') }}">Пользователи</a></li>
            @endability
            @ability('super_admin', 'create_edit_delete_roles')
            <li class="uk-parent"><a href="{{ route('admin.roles') }}">Роли</a></li>
            @endability
            @ability(['super_admin','article_admin', 'author', 'editor'], ['creare_articles', 'edit_articles', 'publish_articles', 'delete_articles'])
            <li class="uk-active"><a href="{{ route('admin.articles') }}">Блог</a></li>
            @endability
        </ul>
    </nav>
    <h2>Менеджер статей: создать статью</h2>
    <form class="uk-form uk-form-horizontal" action="" method="post">
        {{ csrf_field() }}
        <fieldset data-uk-margin>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-in">Название статьи<sup>*</sup></label>
                <div class="uk-form-controls">
                    <input class="uk-width-1-1" id="form-h-in" type="text" name="title" value="{{ $title }}">
                    @if ($errors->has('title'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('title') }}</div>
                    @endif
                </div>
            </div>

            <div class="uk-form-row">
                <label class="uk-form-label" for="form-h-td">Содержание статьи</label>
                <div class="uk-form-controls">
                    <textarea data-uk-htmleditor="{markdown:true}" class="" id="form-h-td" type="text" name="content" value="{{ $article_content }}"></textarea>
                    @if ($errors->has('content'))
                        <div class="uk-badge uk-badge-danger">{{ $errors->first('content') }}</div>
                    @endif
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-ip">Опубликовать</label>
                <div class="uk-form-controls">
                    <input id="form-ip" type="checkbox" name="publish" value="1">
                </div>
            </div>
            <input type="hidden" name="author" value="{{ $author['id'] }}">
        </fieldset>
        <div class="uk-margin-top">
            <button class="uk-button uk-button-primary" type="submit"><i class="uk-icon-plus"></i>Создать</button>
            <a href="/administrator/articles" class="uk-button"><i class="uk-icon-remove"></i>Отменить</a>
        </div>
    </form>
</div>