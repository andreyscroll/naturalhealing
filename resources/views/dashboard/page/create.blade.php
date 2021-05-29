@extends('layouts.dashboard')
@section('title', 'Создать новую страницу')
@section('main')
    <h3>Создать новую страницу</h3>
    <form action="{{ route('dashboard.page.store') }}" method="POST">
        @csrf
        {{-- Title --}}
        <label for="name">Заголовок</label>
        <input type="text" name="name" id="name" class="form-control mb-3">
        {{-- Slug --}}
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control mb-3">
        {{-- Description --}}
        <label for="content">Текст страницы</label>
        <textarea name="content" id="content" class="form-control mb-3" cols="30" rows="15"></textarea>

        <button type="submit" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
            </svg>
            Создать страницу
        </button>
    </form>
@endsection
