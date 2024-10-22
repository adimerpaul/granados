@extends('layouts.app')

@section('content')

    <section class="show-internal-requirements">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">
                        Lista <br> <strong>( Ordenes de Despacho)</strong>
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a class="btn btn-outline-secondary" href="{{route('logistics.dispatchOrders.index')}}">
                        <i class="fas fa-arrow-left"></i>
                        Panel Principal
                    </a>
                </div>
                
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Almacen de <br>Despacho</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">U  |  M</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dispatchRequirements as $dispatchRequirement)
                                <tr>
                                    <th scope="row">
                                        {{$dispatchRequirement->work->name}}
                                    </th>

                                    <td>
                                        {{-- <span style="color: rgb(38, 157, 101);"> --}}
                                            {{$dispatchRequirement->requiredProduct->product->name}}
                                        {{-- </span> --}}
                                    </td>

                                    <td>
                                        <span style="padding:5px 8px;border:1px solid #000;width:90px;display:inline-block;">
                                            {{$dispatchRequirement->quantity}}
                                        </span>
                                    </td>

                                    <td>
                                        {{$dispatchRequirement->requiredProduct->product->measure->symbol}}
                                    </td>
                                    <td>
                                        
                                        @if ($dispatchRequirement->status == 'Por Despachar')
                                            <span style="display:inline-block;padding:5px 8px;border-radius:8px;border:2px solid rgb(247, 187, 22);color:rgb(247, 187, 22);">
                                                {{$dispatchRequirement->status}}
                                            </span>
                                        @elseif ($dispatchRequirement->status == 'Despachado')
                                            <span style="display:inline-block;padding:5px 8px;border-radius:8px;border:2px solid green;color:green;">
                                                {{$dispatchRequirement->status}}
                                            </span>
                                        @endif
                                    </td>
                                        
                                </tr>                                  
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
    </section>

@endsection