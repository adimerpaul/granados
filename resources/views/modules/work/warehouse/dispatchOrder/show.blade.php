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
                    <a class="btn btn-outline-secondary" href="{{route('works.warehouses.dispatchOrders.index', ['work' => Auth::user()->work->id])}}">
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
                                <th scope="col">Obra <br> Solicitante</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">U  |  M</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dispatchRequirements as $dispatchRequirement)
                                <tr>
                                    <th scope="row">
                                        {{$dispatchRequirement->requirement->work->name}}
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

                                        @if($dispatchRequirement->status == 'Por Despachar')
                                            <a class="status" href="" style="border:2px solid rgb(225, 176, 16);color:rgb(225, 176, 16);">
                                                {{$dispatchRequirement->status}}
                                            </a>
                                        @elseif ($dispatchRequirement->status == 'Despachado')
                                            <a class="status" href="" style="border:2px solid green;color:green;">
                                                {{$dispatchRequirement->status}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('works.warehouses.dispatchOrders.status', ['work' => Auth::user()->work->id, 'requirement' => $dispatchRequirement->requirement->id, 'dispatchRequirement' => $dispatchRequirement->id])}}" method="POST">
                                            @csrf

                                            <input class="btn btn-success" type="submit" value="Despachar" {{($dispatchRequirement->status == "Despachado") ? 'disabled' : ''}}>
                                        </form>
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