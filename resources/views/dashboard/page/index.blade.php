@extends('layouts.dashboard')
@section('title', 'Страницы')
@section('main')
    <h3>Страницы</h3>
    <table class="table my-4">
        @foreach($pages as $page)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $page->name }}</td>
                <td>{{ $page->slug }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('dashboard.page.edit', ['id' => $page->id]) }}" class="btn btn-success btn-sm">
                            <i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('dashboard.page.destroy', ['id' => $page->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
