<div>
    <div class="row pt-3">

        <div class="col-12 pb-3">
            <div class="row">

                {{-- Product Name --}}

                <div class="col-12">
                    <div class="form-group">
                        <label for="search">
                            Productos
                        </label>
                        <input type="search" class="form-control" wire:model="search" id="search">
                    </div>
                </div>

            </div>
        </div>

        {{-- Search Result --}}

        <div class="col-12">
            @if(!empty($searchResults))
                
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">U / M</th>
                        <th scope="col">Stock <br>{{Auth::user()->work->name}}</th>
                        <th scope="col">Cant. <br> Requerida</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($searchResults as $inventoryProduct)
                            
                            <tr>
                                
                                <td>
                                    <span style="color: rgb(4, 162, 4);weight:bolder;">
                                        <strong>
                                            {{$inventoryProduct->product->name}}
                                        </strong>
                                    </span>
                                    
                                </td>

                                <td>
                                    {{$inventoryProduct->product->measure->symbol}}
                                </td>
                                
                                <td>
                                    <span style="display: inline-block; border:1px solid green;font-weight:bolder;padding:8px;width:80px;">
                                        {{$inventoryProduct->stock}}
                                    </span>
                                </td>

                                

                                <td>
                                    
                                    <form action="{{route('requiredProducts.store', ['work' => Auth::user()->work_id, 'requiredProductId' => $inventoryProduct->product->id])}}" method="POST">

                                        @csrf

                                        <input type="number" name="quantity" style="width: 80px;padding:5px">
                                        
                                        <input class="btn btn-info text-white" type="submit" value="+">

                                    </form>
                                </td>
                                
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                
            @endif
        </div>
    </div>
</div>
