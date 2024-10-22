<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center p-3">
                    <strong>
                        Comprar
                    </strong>
                </h3>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="btn-danger">
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">U / M</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Obra <br> Solicitante</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($purchaseRequirements as $purchaseRequirement)
                        <tr>
                            <td>
                                {{$purchaseRequirement->requiredProduct->product->name}}
                            </td>
                            <td>
                                {{$purchaseRequirement->requiredProduct->product->measure->symbol}}
                            </td>
                            <td>
                                <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                    {{$purchaseRequirement->quantity}}      
                                </span>
                            
                            </td>
                            <td>
                                {{$purchaseRequirement->requirement->work->name}}
                            </td>
                            <td>
                                <span style="display: inline-block;padding:6px; border:2px solid red; border-radius: 5px;">
                                    {{$purchaseRequirement->status}}
                                </span>
                            </td>
                            <td>
                                <form action="{{route('requirements.purchaseRequirement.destroy', $purchaseRequirement->id)}}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="X" {{($requirement->status == 'Comprando y/o Despachando' || $requirement->status == 'Atendido') ? 'disabled' : ''}}>
                                </form>
                            </td>
                        </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center p-3">
                    <strong>
                        Despachar
                    </strong>
                </h3>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="btn-primary">
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">U / M</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Almacen <br> Despacho</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($dispatchRequirements as $dispatchRequirement)
                    <tr>
                        <td>
                            {{$dispatchRequirement->requiredProduct->product->name}}
                        </td>

                        <td>
                            {{$dispatchRequirement->requiredProduct->product->measure->symbol}}
                        </td>

                        <td>
                            
                            <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                {{$dispatchRequirement->quantity}}    
                            </span>
                            
                        </td>

                        <td>
                            {{$dispatchRequirement->work->name}}
                        </td>

                        <td>
                            <span style="display: inline-block;padding:6px; border:2px solid green; border-radius: 5px;">
                                {{$dispatchRequirement->status}}
                            </span>
                        </td>

                        <td>
                            <form 
                                action="{{route('requirements.dispatchRequirement.destroy', $dispatchRequirement->id)}}" 
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" value="X" {{($requirement->status == 'Comprando y/o Despachando' || $requirement->status == 'Atendido') ? 'disabled' : ''}}>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>