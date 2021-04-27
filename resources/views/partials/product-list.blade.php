<div class="row row-cols-1 row-cols-sm-3 row-cols-md-4">
    @foreach($products as $product)
        <div class="col">
            <div class="card shadow border-light bg-body mb-4">
                <div class="card-body p-3">
                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="text-dark text-decoration-none stretched-link">
                        <h2 class="card-title h5">{{ $product->title }}</h2>
                    </a>
                    <img src="{{ $product->img }}" class="img-fluid p-4" alt="{{ $product->title }}">
                </div>
            </div>
        </div>
    @endforeach
</div>
