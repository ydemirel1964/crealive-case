@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <br><br>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="w3">
                    <th>Id</th>
                    <th>Kullanıcı Adı</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>##</th>
                </tr>
            </thead>
            @foreach ($users as $key => $user)
                <tr>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $user->id }}</td>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $user->name }}</td>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $user->email }}</td>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $user->roles[0]->name }}</td>
                    <td>
                        <button class="form-control">
                            <a href="{{ route('admin.user-edit', ['user' => $user->id]) }}" style="text-decoration:none;">
                                GUNCELLE</a></button>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}<br><br>
    </div>
    </div>
@endsection
