@extends('layouts.base')
@section('title', $page->name)
@section('main')
    <div class="row">
        <div class="col-md">
            <div class="card shadow bg-body border-light">
                <div class="card-body">
                    <h1>{{ $page->name }}</h1>
                    {{ $page->content }}
                </div>
            </div>
        </div>
    </div>
@endsection
