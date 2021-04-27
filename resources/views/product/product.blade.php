@extends('layouts.base2col')
@section('title', $product->title)
@section('content')

    <div class="row">
        <div class="col-md my-4 bg-light">
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
        <div class="col-md-6 p-4">
            <img src="{{ $product->img }}" alt="{{ $product->title }}" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-6 float-end">
            <h1>{{ $product->title }}</h1>
            <span class="fs-4">{{ $product->price }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            {!! $product->description !!}
            {!! $product->structure !!}
        </div>
    </div>

@endsection
