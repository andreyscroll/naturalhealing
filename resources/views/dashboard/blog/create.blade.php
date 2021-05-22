@extends('layouts.dashboard')
@section('title', 'Создание поста')
@section('main')
    <h1>Добавить пост в блог</h1>
    <form action="{{ route('dashboard.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Заголовок">
        </div>
        {{-- Slug --}}
        <div class="mb-3">
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="slug">
        </div>
        {{-- Excerpt --}}
        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt</label>
            <textarea class="form-control" name="excerpt" id="excerpt" rows="3" placeholder="Excerpt"></textarea>
        </div>
        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="7" placeholder="Content"></textarea>
        </div>
        {{-- Thumbnail --}}
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Choose file</label>
            <input class="form-control" type="file" name="img" id="img">
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
