<div>
    
    <div class="row pb-3">
        <div class="col-12">
            
            <input class="form-control" type="search" wire:model="searchProductInventoryManagement" placeholder="Buscar producto...">
           
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Almacen</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Stock</th>
                        <th scope="col">U / M</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventoryResultManagement as $inventoryProduct)
                            
                                <tr>
                                    <td>
                                        {{$inventoryProduct->inventory->work->name}}
                                    </td>
                                    <td>
                                        <span >
                                            <strong>
                                                {{$inventoryProduct->product->code}}
                                            </strong>
                                        </span>
                                    </td>
                                    <td>
                                        <span style="color: rgb(4, 162, 4);weight:bolder;">
                                            <strong>
                                                {{$inventoryProduct->product->name}}
                                            </strong>
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            {{$inventoryProduct->product->category->name}}
                                        </span>
                                    </td>
                                    <td>
                                        <span style="display: inline-block; border:1px solid green;font-weight:bolder;padding:8px;width:80px;">
                                            {{$inventoryProduct->stock}}
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            {{$inventoryProduct->product->measure->symbol}}
                                        </span>
                                    </td>
                                </tr>
                            
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

</div>

