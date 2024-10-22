<!-- Modal -->
<form action="{{route('works.editRequiredProductStatus', ['work' => Auth::user()->work_id, 'requiredProductId' => $requiredProduct->id])}}" method="POST">
    
    @csrf

    <div class="modal fade" id="editRequiredProductStatusModal{{$requiredProduct->id}}" tabindex="-1" aria-labelledby="editRequiredProductStatusModalLabel{{$requiredProduct->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRequiredProductStatusModalLabel{{$requiredProduct->id}}">Editar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-4">
                            <label for="">Cantidad</label>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <input class="form-control" name="quantity" type="number" value="{{$requiredProduct->quantity}}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        X
                        Cerrar
                    </button>
                    <input class="btn btn-success" type="submit" value="Editar">
                </div>
            </div>
        </div>
    </div>
</form>