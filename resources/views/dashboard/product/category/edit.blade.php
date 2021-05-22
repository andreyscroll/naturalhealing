@extends('layouts.dashboard')
@section('title', 'Редактировать категорию')
@section('main')
    <h3>Редактировать категорию</h3>

    <form action="{{ route('dashboard.product.category.update', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- Name --}}
        <input type="text" name="name" id="name" class="form-control mb-3" value="{{ $category->name }}">

        {{-- Description --}}
        <textarea name="description" id="description" class="form-control mb-3" cols="30" rows="10">
            {{ $category->description }}
        </textarea>

        <button type="submit" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
            </svg>
            Сохранить
        </button>
    </form>
@endsection
