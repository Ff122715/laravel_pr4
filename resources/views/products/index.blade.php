@extends('templates.app')
@section('title', 'Главная')

@section('content')
    <h1>Главная</h1>
    <div class="row row-cols-3 row-cols-md-4 g-4 ">
        {{--        @foreach($productsFiveInStock as $product)--}}
        {{--        {{dd(old('products'))}}--}}


        @forelse((old('products') ?? $products) as $product)
            <div class="col">
                <div class="card w-75 h-100 flex-column">
                    <div class="card-img-top text-center mt-2">
                        @if($product->images->count() > 0)
                            <img src="{{ $product->images->first()->img }}" alt="a" class="w-75 h-auto">
                        @else
                            <img src="/public/storage/default/default_img.jpg" alt="a" class="admin_pr_img">
                        @endif
                    </div>
                    <div class="card-body  justify-content-center align-content-center">
                        <h5 class="card-title"> {{ $product->name }}</h5>
                        <div> {{ $product->price }} руб.</div>
                    </div>

                <div class="card-footer">
                    @auth
                        <a href="{{ route('basket.add') }}" data-id="{{ $product->id }}"
                           class="btn btn-primary addToBasket">В корзину</a>
                    @endauth

                    <a href="{{ route('products.show', $product->id) }}">Подробнее</a>
                </div>
            </div>
    </div>
    @empty
        <p>Товары данной категории отсутствуют</p>
        @endforelse
        </div>
@endsection

@push('script')
    <script src="{{ asset('/js/post.js') }}"></script>
    <script>

        let basket = @json(auth()->user() != null ? auth()->user()->baskets()->get() : null );

        let products = basket.map(item => item.product_id);
        let btns = document.querySelectorAll('.addToBasket')
        btns.forEach(btn => {

            let product_id = btn.dataset.id
            // console.log(products, product_id, products.includes(~~product_id))
            if (products.includes(~~product_id)) {

                btn.style.backgroundColor = 'tomato'
                btn.textContent = 'В корзине'
            }
        })

        btns.forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault()
                await postJson('{{ route('basket.add') }}', e.target.dataset.id, 'POST', '{{ csrf_token() }}')

                btn.style.backgroundColor = 'tomato'
                btn.textContent = 'В корзине'
                // btn.style.backgroundColor = '#451100'
            })
        })


    </script>
@endpush
