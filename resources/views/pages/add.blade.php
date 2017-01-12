<div class="new">
    <h2>Новая статья</h2>
    <form method="post">
        <div class="add-new--title">
            <span class="add-new--tag">Название статьи</span>
            <input class="add-new--text" type="text" name="title" value="{{ $new_title }}">
        </div>
        <div class="add-new--content">
            <span class="add-new--tag">Содержание статьи</span>
            <textarea class="add-new--text" name="content">{{ $new_content }}</textarea>
        </div>
        {{ csrf_field() }}
        <input class="button" type="submit" value="Сохранить">
        <a class="button" href="/">Отменить</a>
    </form>
    {{--@if(!empty($errors))--}}
        {{--@foreach($errors as $error)--}}
            {{--<div class="danger">--}}
                {{--<span>{{ $error }}</span>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--@endif--}}
</div>