@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.article-edit', $article->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title">Yazı Başlığı</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ $article->content_title }}">
                </div>
                <div class="form-group">
                    <label for="description">Yazı Açıklaması</label>
                    <input type="description" name="description" id="description" class="form-control"
                        value="{{ $article->content_description }}">
                </div>
                <div class="form-group">
                    <label for="content">Yazı</label>
                    <textarea name="content" id="content" class="form-control">{{ $article->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="categories">Kategori</label>
                    <select name="categories[]" id="categories" class="form-control" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (in_array($category->id, $selected_categories)) {{ 'selected' }} @endif
                                {{ $selected_categories == $category->id ? 'selected' : '' }}>{{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Yazıyı Güncelle</button>
            </form>
        </div>
    </div>
@endsection
