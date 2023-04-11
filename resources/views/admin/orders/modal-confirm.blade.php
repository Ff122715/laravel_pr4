<div class="modal fade" id="modalConfirm{{ $order->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Подтвердить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Подтвердить заказ
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('admin.orders.confirm', $order->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class=" btn btn-outline-success" type="submit" id="btnConfirm">Подтвердить</button>
                </form>
            </div>
        </div>
    </div>
</div>
