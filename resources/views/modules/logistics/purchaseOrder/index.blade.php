@extends('layouts.app')

@section('content')

    <section class="warehouse">
        <div class="container custom-container">

            <div class="row p-2 justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Órdenes de <br>
                        Compra
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('logistics.dashboard')}}">
                        <i class="fas fa-arrow-left"></i>
                        Panel principal
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-danger text-white">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Obra <br> Solicitante</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                              @foreach ($purchaseOrders as $purchaseOrder)
                                <tr>
                                    <td>
                                        <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                            {{$purchaseOrder->id}}
                                        </span>
                                    </td>
                                    <td>
                                        {{$purchaseOrder->requirement->work->name}}
                                    </td>
                                    <td>
                                        {{$purchaseOrder->code}}
                                    </td>
                                    <td>
                                        {{$purchaseOrder->user->name}}
                                    </td>
                                    <td>
                                        @if($purchaseOrder->status == 'Por comprar')
                                            <a class="status" href="" style="border:2px solid red;color:red;">
                                                {{$purchaseOrder->status}}
                                            </a>
                                        @elseif ($purchaseOrder->status == 'Comprado')
                                            <a class="status" href="" style="border:2px solid green;color green;">
                                                {{$purchaseOrder->status}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('logistics.purchaseOrders.show', ['purchaseOrder' => $purchaseOrder->id])}}" class="btn btn-info text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection