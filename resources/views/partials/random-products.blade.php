
@foreach($randomProducts as $rp)
    <div class="m-3 p-4">
        <img src="{{ $rp->img }}" alt="{{ $rp->title }}" class="w-50">
        <a href="{{ route('product.show', ['slug' => $rp->slug]) }}">
            <h3 class="fs-6">{{ $rp->title }}</h3>
        </a>
    </div>
@endforeach
