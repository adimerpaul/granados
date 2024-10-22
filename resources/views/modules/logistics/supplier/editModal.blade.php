<!-- Modal -->
<form action="{{route('logistics.suppliers.update', $supplier->id)}}" method="POST">
    
    @csrf
    @method('PUT')

    <div class="modal fade" id="editSupplierModal{{$supplier->id}}" tabindex="-1" aria-labelledby="editSupplierModal{{$supplier->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSupplierModal{{$supplier->id}}Label">
                        Datos de proveedor
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group" style="text-align: start">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" name="name" value="{{$supplier->name}}">
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">Teléfono</label>
                        <input class="form-control" type="number" name="phone" value="{{$supplier->phone}}">
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">Ubicación</label>
                        <input class="form-control" type="text" name="ubication" value="{{$supplier->ubication}}">
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">RUC</label>
                        <input class="form-control" type="text" name="ruc" value="{{$supplier->ruc}}">
                    </div>

                </div>
                <div class="modal-footer" style="text-align: start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        X
                        Cerrar
                    </button>
                    <input class="btn btn-success" type="submit" value="Actualizar">
                </div>
            </div>
        </div>
    </div>
</form>