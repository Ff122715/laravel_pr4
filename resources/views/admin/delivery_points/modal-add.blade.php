<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Добавить пункт доставки</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.delivery_points.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <label for="address">Адрес</label><br>
                    <input type="text" id="address"
                           name="address" value="{{ old('address') }}">
                    @error('address')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button class=" btn btn-outline-success" type="submit" id="btnDelete">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>
