<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Добавить производителя</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.manufacturers.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <label for="name">Наименование</label><br>
                    <input type="text" id="name"
                           name="name" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror <br>

                    <label for="country">Страна</label><br>
                    <select class="form-select" aria-label="Default select example" name="country_id">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button class=" btn btn-outline-success" type="submit" id="btnDelete">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
