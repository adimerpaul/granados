<!-- Modal -->
<form action="{{route('works.requirements.products.create', ['work' => Auth::user()->work_id])}}" method="POST">
                                
    @csrf

    <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Campos del Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- Product Name --}}

                    <div class="form-group">
                        <label for="product_name">Nombre del producto</label>
                        <input class="form-control" type="text" id="product_name" name="name" autocomplete="on">
                    </div>

                    {{-- Category Name --}}

                    <div class="form-group">
                        <label for="category_name">Categoría</label>
                        <select class="form-control" name="category_id" id="category_name">
                            <option value="">
                                Seleccione una categoría...
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- Produc Measure --}}

                    <div class="row">
                        <div class="col-12">
                            <label for="measure">Unidad</label>
                            <select class="form-control" name="measure_id" id="measure">
                                <option value="">
                                    Seleccione la unidad...
                                </option>
                                @foreach ($measures as $measure)
                                    <option value="{{$measure->id}}">{{$measure->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        X
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-success" value="+ Agregar producto">
                </div>
            </div>
        </div>
    </div>
</form>