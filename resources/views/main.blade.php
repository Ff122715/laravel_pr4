@extends('templates.app')
@section('title', 'Главная')

@section('content')
    <h1>Главная</h1>
    <div class="card-group row row-cols-lg-5 row-cols-md-4 g-4">
        {{--        @foreach($productsFiveInStock as $product)--}}
        {{--        {{dd(old('products'))}}--}}


        @forelse((old('products') ?? $products) as $product)
            <div class="col">
            <div class="card w-50">
                {{--                <img class="card-img-top" src="{{url("/storage/products/" . $product->img) }}" alt="{{url("/storage/products/" . $product->img) }}">--}}
                @include('inc/first_img')
                <p> {{ $product->name }}</p>
                <p> {{ $product->price }}</p>
{{--                <p>Цвет: {{ $product->color->name }}</p>--}}
{{--                <p>Страна: {{ $product->country->name }}</p>--}}
{{--                <p>Дата: {{ $product->dateClassic }}</p>--}}

                @auth
                    <a href="{{ route('basket.add') }}" data-id="{{ $product->id }}" class="btn btn-primary addToBasket">В корзину</a>
                @endauth

                <a href="{{ route('products.show', $product->id) }}">Подробнее</a>
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
        document.querySelectorAll('.addToBasket').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault()
                await postJson('{{ route('basket.add') }}', e.target.dataset.id, 'POST', '{{ csrf_token() }}')
            })
        })
    </script>
@endpush
