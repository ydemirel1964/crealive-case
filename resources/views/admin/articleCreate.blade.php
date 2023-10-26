@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<br><br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.article-store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Yazı Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Yazı Açıklaması</label>
                    <input type="text" name="description" id="description" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label for="content">Yazı</label>
                    <textarea name="content" id="content" class="form-control" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categories">Kategori</label>
                    <select name="categories[]" id="categories" class="form-control" multiple required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-secondary">YAZI EKLE</button>
            </form>
        </div>
    </div>
@endsection
