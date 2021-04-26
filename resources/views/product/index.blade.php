@extends('layouts.base')
@section('title', 'Home')
@section('content')
    <a href="{{ route('product.index') }}">All products</a>

{{--    <ul>--}}
{{--        @foreach($parentCategories as $category)--}}
{{--            <li><a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach($allProducts as $product)
        <div class="col">
            <div class="card shadow border-light bg-body mb-4">
                <img src="{{ $product->img }}" class="card-img-top" alt="{{ $product->title }}">
                <div class="card-body p-3">
                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="text-dark stretched-link">
                        <h2 class="card-title h5">{{ $product->title }}</h2>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
