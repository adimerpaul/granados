@extends('layouts.app')

@section('content')

    <section class="logistics dashboard">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 container-items">
                    <h2 class="text-center">
                        Módulo de Logística
                    </h2>
    
                    <div class="row justify-content-center">
    
                        <div class="col-2 dashboard-items">
                            <a href="{{route('logisticts.suppliers.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/proveedores.png')}}" alt=""><br>
                                Proveedores
                            </a>
                        </div>
                        
                        <div class="col-2 dashboard-items">
                            <a href="{{route('workRequirements.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/requerimientos.png')}}" alt=""> <br>

                                Requerimientos de <br> Obra
                            </a>
                        </div>
    
                        <div class="col-2 dashboard-items">
                            <a href="{{route('logistics.purchaseOrders.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/orden-de-compra.png')}}" alt=""> <br>
                                Ordenes de compra <br> Compra
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('logistics.dispatchOrders.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/orden-de-compra.png')}}" alt=""> <br>
                                Ordenes de <br> Despacho
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('logistics.inventories.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/kardex.png')}}" alt=""> <br>
                                Inventario <br> Almacenes
                            </a>
                        </div>

                    </div>
                    {{-- <div class="row pt-3">
                        
                    </div> --}}
                </div>

            </div>
        </div>
    </section>

@endsection