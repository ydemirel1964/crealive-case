@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.user-edit', $user->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="roles">Roller</label>
                    <select name="roles" id="roles" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" @if ($role->id === $user->roles[0]->id) {{ 'selected' }} @endif
                                {{ $user->roles[0]->id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-secondary">KULLANICI ROL GÜNCELLE</button>
            </form>
        </div>
    </div>
@endsection
