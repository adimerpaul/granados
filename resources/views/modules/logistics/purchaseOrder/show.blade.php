@extends('layouts.app')

@section('content')

    @php
        use App\PurchaseRequirement;
    @endphp

    <section class="show-internal-requirements">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">
                        ( ORDEN DE COMPRA)<br>
                        CODIGO: <strong>{{$purchaseOrder->code}}</strong> <br>
                        <span style="color: red;font-weight:bolder;">
                            {{$purchaseOrder->requirement->work->name}}
                        </span>
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a class="btn btn-outline-secondary" href="{{route('logistics.purchaseOrders.index')}}">
                        <i class="fas fa-arrow-left"></i>
                        Panel Principal
                    </a>
                </div>
                <div class="col-6" style="text-align: end"> 
                    <button class="btn btn-success">
                        <i class="fas fa-print"></i>
                    </button>
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
                                {{-- <th scope="col">Obra Solicitante</th> --}}
                                <th scope="col">Producto</th>
                                <th scope="col">U | M</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">
                                    Estado
                                </th>
                                <th scope="col">Observacion</th>
                                <th scope="col">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    Costo / Und
                                                </div>
                                                <div class="col-4">
                                                    Monto
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
                            @foreach ($purchaseRequirements as $purchaseRequirement)
                                <tr>
                                    {{-- <th scope="row">
                                        {{$purchaseRequirement->requirement->work->name}}
                                    </th> --}}

                                    <td>
                                        {{$purchaseRequirement->requiredProduct->product->name}}
                                    </td>

                                    <td>
                                        {{$purchaseRequirement->requiredProduct->product->measure->symbol}}
                                    </td>

                                    <td>
                                        <span style="padding:5px 8px;border:1px solid #000;width:90px;display:inline-block;">
                                            {{$purchaseRequirement->quantity}}
                                        </span>
                                    </td>
                                    
                                    <td>
                                        <span style="display:inline-block;padding:5px 8px;border-radius:8px;{{($purchaseRequirement->status == 'Req de Compra') ? 'border:2px solid red;color:red;' : 'border:2px solid green;color:green;'}}">
                                            {{$purchaseRequirement->status}}
                                        </span>
                                    </td>
                                    <td>
                                        @if (!empty($purchaseRequirement->observation))
                                            <span style="display: inline-block;padding:5px 8px;border:2px solid red;border-radius:8px;color:red;">
                                                {{$purchaseRequirement->observation}}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-12">
                                                <form action="{{route('logistics.purchaseOrders.udpateAmount', ['requirement' => $purchaseRequirement->requirement->id, 'purchaseRequirement' => $purchaseRequirement->id])}}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <input type="text" name="cost_price" style="padding: 5px 8px;display:inline-block;width:90px;" value="{{($purchaseRequirement->cost_price) ? $purchaseRequirement->cost_price : ''}}">
                                                        </div>
                                                        <div class="col-4">
                                                            <span>
                                                                S/. {{($purchaseRequirement->amount) ? $purchaseRequirement->amount : ''}}
                                                            </span>
                                                        </div>
                                                        <div class="col-4">
                                                            <input class="btn btn-success" type="submit" value="Cal Monto">
                                                        </div>
                                                    </div>
                                                        
                                                </form>
                                            </div>
                                        </div>
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

            <div class="row">
                <div class="col-12" style="text-align: end">
                    <span>
                        <strong>TOTAL :  </strong>
                    </span>
                    <span>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($purchaseRequirements as $purchaseRequirement)

                            @php
                                $total = $total + $purchaseRequirement->amount
                            @endphp

                        @endforeach

                        {{number_format($total, 2, '.', ',')}}

                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <form style="display: inline-block" action="{{route('logistics.purchaseOrders.dispatchWarehouse', ['requirement' => $purchaseRequirement->requirement->id, 'purchaseRequirement' => $purchaseRequirement->id])}}" method="POST">
                        @csrf

                        

                        <input class="btn btn-success" type="submit" value="Despachar a Obra">
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection