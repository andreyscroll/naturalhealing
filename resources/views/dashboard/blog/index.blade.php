@extends('layouts.dashboard')
@section('title', 'Список постов блога')
@section('main')
    <h1>Список постов блога</h1>
    <table class="table">
        @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    <a href="{{ route('dashboard.blog.edit', ['id' => $post->id]) }}" target="_blank" title="Редактировать пост">
                        <i class="bi bi-pencil-square text-success"></i></a>

                    <form action="{{ route('dashboard.blog.destroy', ['id' => $post->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
