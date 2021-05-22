@extends('layouts.dashboard')
@section('title', 'Категории товаров')
@section('main')

    <table class="table table-sm my-4">
        <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Родительская категория</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('dashboard.product.category.edit', ['id' => $category->id]) }}" target="_blank">{{ $category->name }}</a>
                </td>
                <td>
                    @if(is_object($category->parent))
                        {{ $category->parent->name }}
                    @else
                        {{ 'Родительская категория' }}
                    @endif
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

@endsection
