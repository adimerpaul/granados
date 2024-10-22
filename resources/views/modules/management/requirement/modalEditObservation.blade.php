<!-- Modal -->
<form action="{{route('managements.addObservationRequiredProduct', ['requirementId' => $requirement->id, 'requiredProductId' => $requiredProduct->id])}}" method="POST">
    
    @csrf

    <div class="modal fade" id="editObervationModal{{$requiredProduct->id}}" tabindex="-1" aria-labelledby="editObervationModalLabel{{$requiredProduct->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editObervationModalLabel{{$requiredProduct->id}}">Llenar observacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <textarea class="form-control" name="observation" id="" cols="30" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        X
                        Cerrar
                    </button>
                    <input class="btn btn-success" type="submit" value="Agregar">
                </div>
            </div>
        </div>
    </div>
</form>