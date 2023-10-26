@extends('layouts.app')
@section('head')
    <title>Anasayfa - Crealive-Case</title>
@endsection
@section('content')
    <div class="container">
        <p style="display: none;">Anasayfa - Createlive-Case</p>
        <section class="blog-post-area section-margin mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="text-left">
                                <div class="user-info-area">
                                    <p>{{ $article->created_at }}</p>
                                </div>
                            </div>
                            <a href="{!! $article->slug !!}">
                                <h2> {{ $article->content_title }} </h2>
                            </a>
                            <p class="content-description"> {!! $article->content_description !!}</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text article-content"> {!! $article->content !!}</p>

                        </div>
                    </div>
                    <p style="display: none;"> {{ $article->content_title }} </p>
                </div>
            </div>
        </section>
    </div>
@endsection
