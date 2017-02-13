@extends('admin.main')

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
    <script src="../js/admin.users.js"></script>
@endpush

@section('content')
    <h2>Менеджер пользователей: список пользователей</h2>
    <div class="uk-grid uk-margin-top" data-uk-grid-margin>
        <div class="uk-width-1-1">
            <form action="" method="post">
                {{ csrf_field() }}
                @can('create', \App\Models\User::class)
                <a href="{{ route('admin.users.create') }}" class="uk-button uk-button-primary">
                    <i class="uk-icon-plus"></i>Создать
                </a>
                @endcan
                <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Логин</th>
                        <th>Активация</th>
                        <th>Роль</th>
                        <th>E-mail</th>
                        <th>Дата последнего входа</th>
                        <th>Дата регистрации</th>
                        <th>ID</th>
                        <th>Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>{!! $i++ !!}</td>
                            <td>
                                @if($user->login == SUPER_ADMIN_LOGIN)
                                    <span>{{ $user->name }}</span>
                                @else
                                    @can('edit', \App\Models\User::class)
                                        <a href="/administrator/users/edit/{{ $user->id }}">{{ $user->name }}</a>
                                    @endcan
                                    @cannot('edit', \App\Models\User::class)
                                        <span>{{ $user->name }}</span>
                                    @endcannot
                                @endif
                            </td>
                            <td>{{ $user->login }}</td>
                            <td>
                                @if($user->login == SUPER_ADMIN_LOGIN)
                                <div class="activate" id="{{ $user->id }}">
                                    <button class="uk-button uk-active" disabled><i class="uk-icon-check"></i></button>
                                </div>
                                @elseif($user->activate == 1)
                                <div class="activate uk-button-group" id="{{ $user->id }}">
                                    @can('activate', \App\Models\User::class)
                                        <button class="uk-button uk-active button-on"><i class="uk-icon-check"></i></button>
                                        <button class="uk-button button-off"><i class="uk-icon-ban"></i></button>
                                    @endcan
                                    @cannot('activate', \App\Models\User::class)
                                        <button class="uk-button uk-active" disabled><i class="uk-icon-check"></i></button>
                                    @endcannot
                                </div>
                                @else
                                <div class="activate uk-button-group" id="{{ $user->id }}">
                                    @can('activate', \App\Models\User::class)
                                        <button class="uk-button button-on"><i class="uk-icon-check"></i></button>
                                        <button class="uk-button uk-active button-off"><i class="uk-icon-ban"></i></button>
                                    @endcan
                                    @cannot('activate', \App\Models\User::class)
                                        <button class="uk-button uk-active" disabled><i class="uk-icon-ban"></i></button>
                                    @endcannot
                                </div>
                                @endif
                            </td>
                            <td>
                                @if(isset($user->role[0]->display_name))
                                    {{ $user->role[0]->display_name }}
                                @else
                                    Не назначена
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->last_visit_at }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if($user->login == SUPER_ADMIN_LOGIN)
                                    <div>
                                        <button class="uk-button" disabled><i class="uk-icon-close"></i></button>
                                    </div>
                                @else
                                    <div class="delete" id="{{ $user->id }}">
                                        @can('delete', \App\Models\User::class)
                                            <button class="uk-button uk-button-danger"><i class="uk-icon-close"></i></button>
                                        @endcan
                                        @cannot('delete', \App\Models\User::class)
                                            <button class="uk-button" disabled><i class="uk-icon-close"></i></button>
                                        @endcannot
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <script>
                        var url_activate = '{{ route('api.user.activate') }}';
                        var url_delete = '{{ route('api.user.delete') }}';
                    </script>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
