<div class="modal fade" id="modalCancel{{ $order->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Отмена заказа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.orders.cancel', $order->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <p>Отменить заказ?</p>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button class=" btn btn-outline-danger" type="submit" id="btnCancel">Подтвердить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
