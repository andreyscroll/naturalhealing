@extends('layouts.dashboard')
@section('title', 'Редактирование поста')
@section('main')
    <h3>Редактирование поста "{{ $post->title }}"</h3>
    <form action="{{ route('dashboard.blog.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">
        </div>
        {{-- Excerpt --}}
        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" id="excerpt" rows="3" placeholder="Excerpt">
                {!! $post->excerpt !!}
            </textarea>
        </div>
        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="7" placeholder="Content">
                {!! $post->content !!}
            </textarea>
        </div>
        {{-- Thumbnail --}}
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Choose file</label>
            <input class="form-control" type="file" name="img" id="img">
        </div>

        @isset($post->img)
        <div class="my-3">
            <img src="{{ asset("storage/{$post->img}") }}" class="img-thumbnail" alt="" width="300">
        </div>
        @endisset

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
