<div class="modal fade" id="modalDelete{{ $manufacturer->id }}" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delModalLabel">Удаление</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Подтвердите удаление
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('admin.manufacturer.destroy', $manufacturer->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class=" btn btn-outline-danger" type="submit" id="btnDelete">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
