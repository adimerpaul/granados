@extends('layouts.app')

@section('content')

    <section class="warehouse-dispatch-requirement-show">
        <div class="container-fluid custom-container">

            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <h4 class="text-center">
                                Lista de Productos <br>
                                <strong>Despachos Logistica</strong>
                            </h4>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
        
                    <div class="row justify-content-center pb-3">
                        <div class="col-md-11">
                            <a class="btn btn-outline-secondary" href="{{route('works.warehouses.dispatchs.index', ['work' => Auth::user()->work_id])}}">
                                <i class="fas fa-arrow-left"></i>
        
                                Panel principal
                            </a>
                        </div>
                    </div>
        
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">U / M</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Cant <br> Ingresada</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Cant <br> a Ingresar
                                                        </div>
                                                        <div class="col-4">
                                                            Observaciones
                                                        </div>
                                                        <div class="col-4">
                                                            Acciones
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
    
                                        @foreach ($requirement->purchaseRequirements as $purchaseRequirement)
                                            @if ($purchaseRequirement->status == 'Despachado')
                                                <tr>
                                                    <td>
                                                        {{$purchaseRequirement->id}}
                                                    </td>
                                                    <td>
                                                        {{$purchaseRequirement->requiredProduct->product->name}}
                                                    </td>
                                                    <td>
                                                        {{$purchaseRequirement->requiredProduct->product->measure->symbol}}
                                                        
                                                    </td>
                                                    <td>
                                                        <span style="display: inline-block;padding:5px 8px;border:1px solid #000;width:90px;">
                                                            {{$purchaseRequirement->quantity}}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{$purchaseRequirement->quantity_entered_into_the_inventory}}
                                                    </td>
                                                    
                                                    <td>
                                                        <span style="display:inline-block;padding:5px 8px;border-radius:8px;{{($purchaseRequirement->status == 'No despachado') ? 'border:2px solid red;color:red;' : 'border:2px solid green;color:green;'}}">
                                                            {{$purchaseRequirement->status}}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form action="{{route('works.warehouses.dispatchs.addStock', ['work' => Auth::user()->work->id, 'requirement' => $requirement->id, 'purchaseRequirement' => $purchaseRequirement->id])}}" method="POST">
        
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <input type="number" name="quantity_entered_into_the_warehouse" {{-- value="{{(empty($purchaseRequirement->quantity_entered_into_the_warehouse) ? '0' : $purchaseRequirement->quantity_entered_into_the_warehouse)}}" --}} style="display: inline-block;padding:5px 8px;border:1px solid green;width:90px;color:green;">
        
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <textarea class="form-control" name="observation" id="" cols="12" rows="3" style="padding: 0 8px;">
                                                                                {{(empty($purchaseRequirement->observation) ? '' : $purchaseRequirement->observation)}}
                                                                            </textarea>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <input class="btn btn-success" type="submit" value="Ingresar a Inv" {{($purchaseRequirement == 'Ingresado al Inventario') ? 'disbled' : ''}}>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection