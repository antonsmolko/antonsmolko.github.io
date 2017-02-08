@extends('admin.main')

@push('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
<script src="../js/admin.roles.js"></script>
@endpush

@section('content')
    <h2>Менеджер ролей: список ролей</h2>
    <div class="uk-grid uk-margin-top" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <form action="" method="post">
                {{ csrf_field() }}
                <a href="{{ route('admin.roles.create') }}" class="uk-button uk-button-primary">
                    <i class="uk-icon-plus"></i>
                    Создать
                </a>
                <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Алиас</th>
                        <th>Описание</th>
                        <th>ID</th>
                        <th>Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($roles as $role)
                        <tr>
                            <td>{!! $i++ !!}</td>
                            <td>
                                <a href="{{ route('admin.roles.edit', ['id' => $role['id']]) }}">{{ $role->display_name }}</a>
                            </td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>{{ $role->id }}</td>
                            <td>
                                <div class="delete" id="{{ $role->id }}">
                                    <button class="uk-button uk-button-danger"><i class="uk-icon-close"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <script>
                        var url_delete = '{{ route('api.role.delete') }}';
                    </script>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection