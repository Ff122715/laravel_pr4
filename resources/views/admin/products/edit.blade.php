@extends('templates.admin_app')

@section('title', 'edit')

@section('content')
    <h1>Редактирование товара</h1>

    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <label for="name">Наименование</label><br>
        <input type="text" id="name"
               name="name" value="{{ old('name', $product->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror <br>


        <label for="count">Количество</label><br>
        <input type="text" id="count"
               name="count" value="{{ old('count', $product->count) }}">
        @error('count')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="price">Стоимость</label><br>
        <input type="text" id="price" name="price" value="{{ old('price', $product->price)}}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="height">Высота</label><br>
        <input type="text" id="height" name="height" value="{{ old('height', $product->height)}}">
        @error('height')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="desc">Описание</label><br>
        <textarea name="desc" id="desc">{{ old('description', $product->description)}}</textarea>
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="country">Производитель</label><br>
        <select class="form-select" aria-label="Default select example" name="manufacturer_id">
            @foreach($manufacturers as $manufacturer)
                <option
                    value="{{ $manufacturer->id }}" {{ old('country', $product->manufacturer_id == $manufacturer->id ? 'selected' : '') }}>{{ $manufacturer->name }}</option>
            @endforeach
        </select>
        @error('country')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="img">Изображение</label><br>
        <input type="file" id="img" name="img[]" value="{{ old('img', $product->images)}}" multiple>
        @error('img')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>
        <div id="imgContainer">
            @foreach($product->images as $img)
                <div class="img-card">
                    <button type="button" data-method="delete" class="jquery-postback"
                            onclick="deleteImage({{ $img->id }})">xxx
                    </button>
                    <img src="{{ old('img', $img->img)}}" alt="a" class="form__img" data-image-id="{{ $img->id }}">
                </div>
                {{--            ссылка на контроллер изображений (удаление) ???проверка если не осалось изображений - дефолтное изображение --}}
            @endforeach
        </div>

        <div id="newImgContainer">
{{--            @foreach($product->images as $img)--}}
{{--                <div class="img-card">--}}
{{--                    <button type="button" data-method="delete" class="jquery-postback"--}}
{{--                            onclick="deleteImage({{ $img->id }})">xxx--}}
{{--                    </button>--}}
{{--                    <img src="{{ old('img', $img->img)}}" alt="a" class="form__img" data-image-id="{{ $img->id }}">--}}
{{--                </div>--}}
{{--                --}}{{--            ссылка на контроллер изображений (удаление) ???проверка если не осалось изображений - дефолтное изображение --}}
{{--            @endforeach--}}
        </div>

        <button type="submit">Сохранить</button>
    </form>

@endsection

@push('script')
    <script src="{{ asset('/js/post.js') }}"></script>
    <script>
        async function deleteImage(imgId) {
            let res = await postJson('{{ route('admin.image.destroy') }}', imgId, 'DELETE', '{{ csrf_token() }}');
            if (res === 'ok') {
                document.querySelector(`[data-image-id="${imgId}"]`).closest('.img-card').remove();
            }
        }

        img.addEventListener('change', (e) => {
            newImgContainer.innerHTML = '';
            [...e.target.files].forEach(file => {
                let fr = new FileReader();
                fr.readAsDataURL(file);
                fr.onload = () => {
                    let img = document.createElement('img');
                    img.src = fr.result;
                    img.alt = "img";
                    img.className = "form__img";
                    newImgContainer.append(img);
                }
            })
        })
    </script>
@endpush
