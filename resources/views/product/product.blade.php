@extends('layouts.base')
@section('title', $product->title)
@section('content')
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

    <h1>{{ $product->title }}</h1>
    <img src="{{ $product->img }}" alt="">
    <p><b>Категория: {{ $product->category->name }}</b></p>
    {!! $product->description !!}
    {!! $product->structure !!}
@endsection
