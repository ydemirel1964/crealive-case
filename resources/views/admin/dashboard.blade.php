@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <br><br>
    <div class="row">

        <a style="color:black;text-decoration:none;" href="{{ url('admin/article/create') }}">
            <p>
                <button class="btn btn-secondary">
                    <b>YENI YAZI EKLE »</b>
                </button>
            </p>
        </a>
        <br>

        <table class="table table-striped table-bordered">
            <thead>
                <tr class="w3">
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>İçerik</th>
                    <th>##</th>
                </tr>
            </thead>

            @foreach ($articles as $key => $article)
                <tr>
                    <td>{{ $article->content_title }}</td>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $article->content_description }}</td>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $article->content }}</td>
                    <td>
                        <button class="form-control">
                            <a href="{{ route('admin.article-edit', ['article' => $article->id]) }}" style="text-decoration:none;">
                                GUNCELLE</a></button>
                        <form method="POST" action="{{ route('admin.article-destroy', ['article' => $article->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="form-control" style="margin-top:5px;">SİL</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}<br><br>
    </div>
    </div>
@endsection
