<!-- Modal -->
<form action="{{route('managaments.works.store')}}" method="POST">
    
    @csrf

    <div class="modal fade" id="createWorkModal" tabindex="-1" aria-labelledby="createWorkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createWorkModalLabel">Campos de la Obra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <textarea class="form-control" name="name" id="" cols="30" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Entidad Contratante</label>
                        <textarea class="form-control" name="entity" id="" cols="30" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Costo de la obra (S/)</label>
                        <input class="form-control" type="text" name="work_cost">
                    </div>

                    <div class="form-group">
                        <label for="">Plazo contractual</label>
                        <input class="form-control" type="text" name="contractual_term">
                    </div>

                    <div class="form-group">
                        <label for="">Ejecutor de Obra</label>
                        <input class="form-control" type="text" name="work_executor">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        X
                        Cerrar
                    </button>
                    {{-- <a href="{{route}}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
    
                        Crear obra
                    </a> --}}
                    <input class="btn btn-success" type="submit" value="+ Crear obra">
                </div>
            </div>
        </div>
    </div>
</form>