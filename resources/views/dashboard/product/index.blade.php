@extends('layouts.dashboard')
@section('title', 'Каталог товаров')
@section('main')

    <h3>Список товаров</h3>

    <p>Всего товаров: {{ $products->total() }}</p>

    <div class="my-3">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <p>Фильтрация по категории:</p>
                </div>
                <div class="col-md-6">
                    <select name="categoryId" id="categoryId" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == request()->categoryId) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary">Показать</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>№</td>
                <td>Название</td>
                <td>Категория</td>
                <td>Ссылки</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}" target="_blank" title="Посмотреть страницу">
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                        <a href="{{ route('dashboard.product.edit', ['id' => $product->id]) }}" target="_blank" title="Редактировать страницу">
                            <i class="bi bi-pencil-square text-success"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

@endsection
