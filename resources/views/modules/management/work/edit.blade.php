<!-- Modal -->
<form action="{{route('managaments.works.update', ['work' => $work->id ])}}" method="POST">
    
    @csrf
    @method('PUT')

    <div class="modal fade" id="editWorkModal{{$work->id}}" tabindex="-1" aria-labelledby="editWorkModal{{$work->id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWorkModa{{$work->id}}lLabel">Campos de la Obra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group" style="text-align: start">
                        <label class="" for="">Nombre</label>
                        <textarea class="form-control" name="name" id="" cols="30" rows="2">{{$work->name}}</textarea>
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">Entidad Contratante</label>
                        <textarea class="form-control" name="entity" id="" cols="30" rows="2">{{$work->entity}}</textarea>
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">Costo de la obra (S/)</label>
                        <input class="form-control" type="text" name="work_cost" value="{{$work->work_cost}}">
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">Plazo contractual</label>
                        <input class="form-control" type="text" name="contractual_term" value="{{$work->contractual_term}}">
                    </div>

                    <div class="form-group" style="text-align: start">
                        <label for="">Ejecutor de Obra</label>
                        <input class="form-control" type="text" name="work_executor" value="{{$work->work_executor}}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cerrar
                    </button>
                    <input class="btn btn-primary" type="submit" value="Editar obra">
                </div>
            </div>
        </div>
    </div>
</form>