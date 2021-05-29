@extends('layouts.base')
@section('title', 'Блог')
@section('main')
    <div class="row justify-content-between">
        <div class="col-md-8">
            <img src="{{ asset("storage/{$post->img}") }}" alt="{{ $post->title }}" class="img-fluid">
            <h1>{{ $post->title }}</h1>
            {!! $post->content !!}
        </div>
        <div class="col-md-3">
            @foreach($randomPosts as $randomPost)
                <div class="pb-4">
                    <img src="{{ asset("storage/{$randomPost->img}") }}" class="img-fluid" alt="">
                    <a href="{{ route('blog.show', ['slug' => $randomPost->slug]) }}" class="text-secondary text-decoration-none">
                        <h3 class="h4 my-3">{{ $randomPost->title }}</h3></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
