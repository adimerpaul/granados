<!-- Modal -->
<form action="{{route('logistics.suppliers.store')}}" method="POST">
    
    @csrf

    <div class="modal fade" id="createSupplierModal" tabindex="-1" aria-labelledby="createSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSupplierModalLabel">
                        Datos de proveedor
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input class="form-control" type="number" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="">Ubicación</label>
                        <input class="form-control" type="text" name="ubication">
                    </div>

                    <div class="form-group">
                        <label for="">RUC</label>
                        <input class="form-control" type="text" name="ruc">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        X
                        Cerrar
                    </button>
                    <input class="btn btn-success" type="submit" value="+ Agregar">
                </div>
            </div>
        </div>
    </div>
</form>