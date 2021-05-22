@extends('layouts.base')
@section('title', 'Каталог товаров')
@section('main')

    <div class="row">
        <div class="col-md">
            @include('partials.product-list')
        </div>
    </div>

@endsection
