@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')<br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.category-store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" name="category" id="category" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-secondary">KATEGORI EKLE</button>
            </form>
        </div>
    </div>
@endsection
