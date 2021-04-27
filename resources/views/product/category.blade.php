@extends('layouts.base')
@section('title', $category->name)
@section('content')

    @if($childCategories)
        <div class="my-4">
        @foreach($childCategories as $childCategory)
            <a href="{{ route('product.category', ['slug' => $childCategory->slug]) }}" class="btn btn-outline-primary btn-sm mb-3">
                {{ $childCategory->name }}
            </a>
        @endforeach
        </div>
    @endif

    @if($products)
        @include('partials.product-list')
    @else
        <p>Нет товаров</p>
    @endif

@endsection
