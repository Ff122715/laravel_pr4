<div>
{{--    <form action="{{ route('products.filter') }}">--}}
{{--        <input type="radio" name="country" id="country">--}}
{{--        <label for="country">Страна</label>--}}

{{--        <input type="radio" name="name" id="name">--}}
{{--        <label for="name">Наименование</label>--}}

{{--        <input type="radio" name="price" id="price">--}}
{{--        <label for="price">Цена</label>--}}

{{--        <select name="">--}}
{{--            <option value="">По возрастанию</option>--}}
{{--            <option value="">По убыванию</option>--}}
{{--        </select>--}}


{{--        <div>Фильтр по категории</div>--}}
{{--        фильтрация радио кнопками--}}
{{--        <input type="radio" name="category" id="all" value="all" checked>--}}
{{--        <label for="all">Все</label>--}}

{{--        @foreach($categories as $category)--}}
{{--            <input type="radio" name="category" id="{{ $category->id }}" value="{{ $category->id }}"--}}
{{--                   onchange="this.form.submit()"--}}
{{--                   {{ old('category') == $category->id ? 'checked' : '' }}>--}}
{{--            <label for="{{ $category->id }}">{{ $category->name }}</label>--}}
{{--        @endforeach--}}

{{--        <button>Ok</button>--}}

{{--        @foreach($categories as $category)--}}
{{--            <input type="checkbox" name="category[]" id="{{ $category->id }}" value="{{ $category->id }}"--}}
{{--                   onchange="this.form.submit()"--}}
{{--                {{ in_array($category->id, (array) old('category')) ? 'checked' : '' }}>--}}
{{--            <label for="{{ $category->id }}">{{ $category->name }}</label>--}}
{{--        @endforeach--}}
{{--        <button>Ok</button>--}}
{{--    </form>--}}
</div>
