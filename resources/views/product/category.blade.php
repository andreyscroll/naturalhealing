@extends('layouts.base')
@section('title', $category->name)
@section('main')

    <div class="row">
        <div class="col-md">
            @if($children)
                <div class="my-4">
                    @foreach($children as $childCategory)
                        <a href="{{ route('product.category', ['slug' => $childCategory->slug]) }}" class="btn @if($category->slug == $childCategory->slug) btn-primary pe-none @else btn-outline-primary @endif btn-sm mb-2">
                            {{ $childCategory->name }}
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="mb-4">
                <h1>Товары категории {{ $category->name }}</h1>
            </div>

            @if($products)
                @include('partials.product-list')
                {{ $products->links() }}
            @else
                <p>Нет товаров</p>
            @endif

            <h2>Описание</h2>
                {!! $category->description !!}
        </div>
    </div>

@endsection
