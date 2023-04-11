@extends('templates.app')

@section('title', 'Корзина')

@section('content')

    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <div class="container">
        <div class="row">
            <div class="col col-8">
                <h1>Корзина</h1>
            </div>
        </div>
        <div class="row gx-5">
            <div class="col col-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Изображение</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Кол-во</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                @if($item->product->images->count() > 0)
                                    <img src="{{ $item->product->images->first()->img }}" alt="a" class="admin_pr_img">
                                @else
                                    <img src="/public/storage/default/default_img.jpg" alt="a" class="admin_pr_img">
                                @endif
                            </td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->price }}</td>
                            <td>
                                <button class="counter-button minus" data-product-id-minus="{{ $item->product_id }}"
                                        onclick="calcDec(this, {{ $item->product_id }})">-
                                </button>
                                <span id="count-{{ $item->product_id }}"
                                      data-product-count="{{ $item->product->count }}"
                                      data-item-count="{{ $item->count }}" class="count-item">{{ $item->count }}</span>
                                <button class="counter-button plus" data-product-id-plus="{{ $item->product_id }}"
                                        onclick="calcInc(this, {{ $item->product_id }})">+
                                </button>
                                <br>
                                <span class="text-grey">В наличии: {{ $item->product->count }}</span>
                            </td>
                            <td id="summary-{{ $item->product_id }}">{{ $item->summary }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $item->id }}" value="{{ $item->id }}">
                                    Удалить
                                </button>
                                @include('basket.modal-delete')
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="col">
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <h3>Оформить заказ</h3>

                    <div>
                        Общее кол-во товаров:
                        <span id="totalCount">{{ \App\Models\Basket::totalCount()}}</span>
                    </div>
                    <div>
                        Общая стоимость:
                        <span id="totalPrice">{{ \App\Models\Basket::totalPrice()}} руб.</span>
                    </div>

                    <label for="point" class="mt-3">Пункт доставки</label><br>
                    <select class="form-select w-auto mb-4" aria-label="Default select example" name="point" id="point">
                        @foreach($delivery_points as $point)
                            <option value="{{ $point->id }}">
                                {{ $point->address }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="password">Введите пароль</label><br>
                    <input type="password" id="password" name="password" class="mb-4"><br>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit">Оформить</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('/js/post.js') }}"></script>
    <script>
        function checkCountBtns() {
            let countSpans = document.querySelectorAll('.count-item')
            countSpans.forEach(countSpan => {
                if (countSpan.dataset.itemCount === '1')
                    countSpan.previousElementSibling.disabled = true
                else if (countSpan.dataset.productCount === countSpan.dataset.itemCount)
                    countSpan.nextElementSibling.disabled = true
            })
        }

        checkCountBtns()

        function $$(selector) {
            return document.querySelector(selector)
        }

        function showResult(data) {
            $$('#count-' + data.basketProduct.product_id).textContent = data.basketProduct.count
            $$('#summary-' + data.basketProduct.product_id).textContent = data.basketProduct.summary
            $$('#totalPrice').textContent = data.totalPrice
            $$('#totalCount').textContent = data.totalCount
            //console.log(data)
        }

        async function calcInc(btn, product_id) {
            let data = await postJson('{{ route('basket.add') }}', product_id, 'POST', '{{ csrf_token() }}')
            showResult(data)

            if (data.basketProduct.count === data.productCount) {
                //document.querySelector(`[data-product-id-plus="${product_id}"]`).disabled;
                btn.disabled = true;
            }
            document.querySelector(`[data-product-id-minus="${product_id}"]`).disabled = false
        }

        async function calcDec(btn, product_id) {
            let data = await postJson('{{ route('basket.decrease') }}', product_id, 'PATCH', '{{ csrf_token() }}')
            showResult(data)

            if (data.basketProduct.count === 1) {
                //document.querySelector(`[data-product-id-minus="${product_id}"]`).disabled;
                btn.disabled = true;
            }
            document.querySelector(`[data-product-id-plus="${product_id}"]`).disabled = false
        }
    </script>
@endpush
