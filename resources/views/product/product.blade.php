@extends('layouts.base')
@section('title') Купить {{ $product->title }} @endsection
@section('main')

    <div class="row">
        <div class="col-md m-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('product.category', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $product->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">

            <div class="card shadow-sm p-3 mb-5 bg-body border-light rounded">
                <div class="card-body">
                    {{--Карточка товара--}}
                    <div class="row">
                        <div class="col-md-6 p-4">
                            <img src="{{ $product->img }}" alt="{{ $product->title }}" class="img-fluid img-thumbnail p-3">
                        </div>
                        <div class="col-md-6 float-end">
                            <h1>{{ $product->title }}</h1>
                            <span class="fs-4">{{ $product->price }}</span>
                        </div>
                    </div>
                    <div class="product-description my-4">
                        {!! $product->description !!}
                        {!! $product->structure !!}
                    </div>
                    {{--Конец карточки--}}
                </div>
            </div>

        </div>

        <div class="col-md-3">
            @include('partials.sidebar')
        </div>
    </div>

@endsection
