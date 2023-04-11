@extends('templates.app')

@section('title', 'Товар')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-5">
                @if($product->images->count() > 0)
                    <img src="{{ $product->images->first()->img }}" alt="a" class="mt-5 w-75">
                @else
                    <img src="/public/storage/default/default_img.jpg" alt="a" class="admin_pr_img">
                @endif
            </div>

            <div class="col pt-4">
                <h4 class="p-3"> {{ $product->name }}</h4>
                <p>Цена: {{ $product->price }} руб.</p>
                <p>Производитель: {{ $product->manufacturer->name }}</p>
                {{--    <p>Страна: {{ $product-> }}</p>--}}
                <p>Кол-во на складе: {{ $product->count }} шт.</p>
                <p class="w-75">Описание: {{ $product->description }}</p>
                @auth
                    <div class="p-3">
                        <a href="{{ route('basket.add') }}" data-id="{{ $product->id }}"
                           class="btn btn-primary addToBasket">В
                            корзину
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('/js/post.js') }}"></script>
    <script>
        document.querySelectorAll('.addToBasket').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault()
                await postJson('{{ route('basket.add') }}', e.target.dataset.id, '{{ csrf_token() }}')
            })
        })
    </script>
@endpush
