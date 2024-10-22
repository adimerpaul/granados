<div class="row justify-content-center">

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">

                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Producto</th>
                        <th scope="col">U / M</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($requiredProducts as $key => $requiredProduct)

                            <tr>

                                <td>
                                    <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                        {{ $key + 1}}
                                    </span>
                                    
                                </td>

                                <td>
                                    {{$requirement->code}}
                                </td>

                                <td>
                                    {{$requirement->user->name}}
                                </td>

                                <td>
                                    {{ $requiredProduct->product->name }}
                                    
                                </td>

                                <td>
                                    {{ $requiredProduct->product->measure->symbol}}
                                </td>
    
                                <td>
                                    <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                        {{ $requiredProduct->quantity }}        
                                    </span>
                                </td>
    
                                <td>
                                    <form action="{{route('requirements.productPurchase', ['requirementId' => $requirement->id, 'requiredProduct' => $requiredProduct->id])}}" method="POST">

                                        @csrf

                                        <input type="text" name="quantity_to_purchase" style="width: 80px;padding:5px;border: 1px solid #cacaca">
                                        <input class="btn btn-danger" type="submit" value="Comprar" {{($requirement->status == 'Comprando y/o Despachando' || $requirement->status == 'Atendido') ? 'disabled' : ''}}>

                                    </form>
                                </td>
    
                            </tr>
                        
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>