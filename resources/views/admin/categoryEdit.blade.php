@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.category-edit', $category->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ $category->category }}"
                        required>
                </div>
                <button type="submit" class="btn btn-secondary">KATEGORI GÜNCELLE</button>
            </form>
        </div>
    </div>
@endsection
