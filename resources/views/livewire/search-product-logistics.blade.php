
<div>
    <div class="row pt-5">

        <div class="col-12 pb-4">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input type="search" class="form-control" wire:model="searchLogistics" placeholder="Buscar producto ...">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">U / M</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Almacen</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @if($searchResultsLogistics != null || $searchResultsLogistics != "")
                        @foreach($searchResultsLogistics as $inventoryProduct)
                            
                            <tr>
                                <td>
                                    {{$inventoryProduct->product->name}}
                                </td>

                                <td>
                                    {{$inventoryProduct->product->measure->symbol}}
                                </td>

                                <td>
                                    {{$inventoryProduct->stock}}
                                </td>

                                <td>
                                    {{$inventoryProduct->inventory->work->name}}
                                </td>

                                <td>
                                    <form 
                                        action="{{route('requirements.productDispatch', ['requirementId' => $requirement->id, 'inventoryId' => $inventoryProduct->inventory->id, 'productId' => $inventoryProduct->product->id])}}" 
                                        method="POST" 
                                        style=display:inline-block;>

                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-md-5">
                                                <input class="form-control" name="quantity_to_dispatch" type="number" placeholder="Cant">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <input class="btn btn-success text-white" type="submit" value="Req Desp">
                                            </div>
                                        </div>

                                    </form>

                                    {{-- <form 
                                        action="{{route('logistics.productPurchaseRequirement', ['requirementId' => $requirement->id, 'productId' => $inventory->product->id])}}" 
                                        style="display: inline-block;" 
                                        method="POST">

                                        @csrf

                                        <div class="row justify-content-center">
                                            <div class="col-md-5">
                                                <input class="form-control" name="quantity" type="number" placeholder="Cant">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="btn btn-danger" type="submit" value="Compra">
                                            </div>
                                        </div>

                                    </form> --}}
                                </td>
                            </tr>
                            
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

