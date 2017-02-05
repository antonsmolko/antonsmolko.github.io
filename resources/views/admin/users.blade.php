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
                <a href="{{ route('admin.users.create') }}" class="uk-button uk-button-primary">
                    <i class="uk-icon-plus"></i>
                    Создать
                </a>
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
                                @if($user->login == SUPER_ADMIN)
                                    <span>{{ $user->name }}</span>
                                @else
                                    <a href="/administrator/users/edit/{{ $user->id }}">{{ $user->name }}</a>
                                @endif
                            </td>
                            <td>{{ $user->login }}</td>
                            <td>
                                @if($user->login == SUPER_ADMIN)
                                <div class="activate" id="{{ $user->id }}">
                                    <button class="uk-button uk-active" disabled><i class="uk-icon-check"></i></button>
                                </div>
                                @elseif($user->activate == 1 && $user->login != SUPER_ADMIN)
                                <div class="activate uk-button-group" id="{{ $user->id }}">
                                    <button class="uk-button uk-active button-on"><i class="uk-icon-check"></i></button>
                                    <button class="uk-button button-off"><i class="uk-icon-ban"></i></button>
                                </div>
                                @else
                                <div class="activate uk-button-group" id="{{ $user->id }}">
                                    <button class="uk-button button-on"><i class="uk-icon-check"></i></button>
                                    <button class="uk-button uk-active button-off"><i class="uk-icon-ban"></i></button>
                                </div>
                                @endif
                            </td>
                            <td>
                                @if(isset($role[$user->id]))
                                    {{ $role[$user->id]['display_name'] }}
                                @else
                                    Не назначена
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->last_visit_at }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if($user->login == SUPER_ADMIN)
                                    <div>
                                        <button class="uk-button" disabled><i class="uk-icon-close"></i></button>
                                    </div>
                                @else
                                    <div class="delete" id="{{ $user->id }}">
                                        <button class="uk-button uk-button-danger"><i class="uk-icon-close"></i></button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <script>
                        var url_activate = '{{ route('admin.users.activate') }}';
                        var url_delete = '{{ route('admin.users.delete') }}';
                    </script>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection
