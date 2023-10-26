@extends('admin.layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<br><br>
    <div class="row">

        <a style="color:black;text-decoration:none;" href="{{ url('admin/category/create') }}">
            <p>
                <button class="btn btn-secondary">
                    <b>YENI KATEGORI EKLE »</b>
                </button>
            </p>
        </a>
        <br>

        <table class="table table-striped table-bordered">
            <thead>
                <tr class="w3">
                    <th>Id</th>
                    <th>Kategori</th>
                    <th>##</th>
                </tr>
            </thead>

            @foreach ($categories as $key => $category)
                <tr>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $category->id }}</td>
                    <td style='word-wrap: break-word;max-width:500px;'>{{ $category->category }}</td>
                    <td>
                        <button class="form-control">
                            <a href="{{ route('admin.category-edit', ['category' => $category->id]) }}"
                                style="text-decoration:none;">
                                GUNCELLE</a></button>

                        <form method="POST" action="{{ route('admin.category-destroy', ['category' => $category->id]) }}">
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
        {{ $categories->links() }}<br><br>
    </div>
    </div>
@endsection
