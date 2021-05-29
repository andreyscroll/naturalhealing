@extends('layouts.base')
@section('title', 'Блог')
@section('main')
    <div class="row">
        <div class="col-md">
            <h1>Блог</h1>
            <div class="row row-cols-1 row-cols-md-3">
                @foreach($posts as $post)
                    <div class="col">
                        <div class="card mb-3 border-light shadow-sm">
                            <img src="{{ asset("storage/{$post->img}") }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">
                                    <h2 class="card-title my-1">{{ $post->title }}</h2>
                                </a>
                                {!! $post->excerpt !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
