@extends('layouts.base')
@section('title', 'Поиск')
@section('main')
    <div class="row">
        <div class="col-md">
            @if($searchData->isNotEmpty())
                <h1>Результаты поиска: {{ $searchKey }}</h1>
                @foreach($searchData as $result)
                    <a href="{{ route('product.show', ['slug' => $result->slug]) }}" target="_blank">
                        <h3>{{ $result->title }}</h3>
                    </a>
                @endforeach
            @else
                <h1>Нет результатов поиска!</h1>
            @endif
        </div>
    </div>
@endsection
