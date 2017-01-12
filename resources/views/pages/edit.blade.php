<div class="new">
    <h2>Редактирование статьи</h2>
    <form method="post">
        <div class="edit-new--title">
            <span class="edit-new--tag">Название статьи</span>
            <input class="edit-new--text" type="text" name="title" value="{{ $new_title }}">
        </div>
        <div class="edit-new--content">
            <span class="edit-new--tag">Содержание статьи</span>
            <textarea class="edit-new--text" name="content">{{ $new_content }}</textarea>
        </div>
        <a class="button" href="/new/{{ $id }}">Отменить</a>
        <input class="button" type="submit" value="Сохранить">
    </form>
    @if($errors != '')
        @foreach($errors as $error)
            <div class="danger">
                <span>{{ $error }}</span>
            </div>
        @endforeach
    @endif
</div>