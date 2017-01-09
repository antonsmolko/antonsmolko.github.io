 @foreach($news as $new)
    <div class="new">
        <h2>{{ $new->title }}</h2>
        <span class="new--dt note">
            {{ $new->dt_edit }}
        </span>
        <div class="new--body">
            <p>
                {{ $new->content }}
            </p>
        </div>
        {{--<div class="new--control">--}}
            {{--<a class="new--readmore button" href="/new/{{ $new->id }}">Подробнее</a>--}}
            {{--@if($auth)--}}
                {{--@if ($add_edit)--}}
                    {{--<a class="new--edit button" href="/edit/{{ $new->id }}">Редактировать</a>--}}
                {{--@endif--}}
                {{--@if ($delete)--}}
                    {{--<a class="new--delete button" href="/delete?id={{ $new->id }}">Удалить</a>--}}
                {{--@endif--}}
            {{--@endif--}}
        {{--</div>--}}
    </div>
@endforeach