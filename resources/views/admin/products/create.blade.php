@extends('templates.admin_app')

@section('title', 'create')

@section('content')
    <h1>Создание товара</h1>

    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <label for="name">Наименование</label><br>
        <input type="text" id="name"
               name="name" value="{{ old('name') }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror <br>


        <label for="count">Количество</label><br>
        <input type="text" id="count"
               name="count" value="{{ old('count') }}">
        @error('count')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="height">Высота</label><br>
        <input type="text" id="height" name="height" value="{{ old('height')}}">
        @error('height')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="price">Стоимость</label><br>
        <input type="text" id="price" name="price" value="{{ old('price')}}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="desc">Описание</label><br>
        <textarea name="desc" id="desc"></textarea>
        @error('desc')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>

        <label for="country">Производитель</label><br>
        <select class="form-select w-auto" aria-label="Default select example" name="manufacturer_id">
            @foreach($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}" selected>{{ $manufacturer->name }}</option>
            @endforeach
        </select>
        @error('country')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <label for="img">Изображение</label><br>
        <input type="file" id="img" name="img[]" value="{{ old('img')}}" multiple>
        @error('img')
        <p class="text-danger">{{ $message }}</p>
        @enderror<br>
        <div id="imgContainer"></div>

        <button class="btn btn-success mt-4">Создать</button>
    </form>

@endsection

@push('script')
    <script>
        img.addEventListener('change', (e) => {
            imgContainer.innerHTML = '';
            [...e.target.files].forEach(file => {
                let fr = new FileReader();
                fr.readAsDataURL(file);
                fr.onload = () => {
                    let img = document.createElement('img');
                    img.src = fr.result;
                    img.alt = "img";
                    img.className = "form__img";
                    imgContainer.append(img);
                }
            })
        })
    </script>
@endpush
