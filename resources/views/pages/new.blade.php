<div class="new">
    <h2>{{ $new['title'] }}</h2>
    <span class="new--dt note">
        {{ $new['dt_edit'] }}
    </span>
    <div class="new--body">
        <p>{{ $new['content'] }}</p>
    </div>
    <div class="new--control">
        <a class="button" href="/">К списку новостей</a>
        {{--@if ($auth)--}}
            {{--@if ($add_edit)--}}
                <a class="button" href="/edit/{{ $new['id'] }}">Редактировать</a>
            {{--@endif--}}
            {{--@if ($delete)--}}
                <a class="button" href="/delete/{{ $new['id'] }}">Удалить</a>
            {{--@endif--}}
        {{--@endif--}}

    </div>
</div>