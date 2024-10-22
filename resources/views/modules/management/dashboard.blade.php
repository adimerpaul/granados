@extends('layouts.app')

@section('content')

    <section class="management dashboard">
        <div class="container">
            <div class="row justify-content-center">
    
                <div class="col-12 container-items">
                    <h2 class="text-center">
                        Módulos de Gerencia
                    </h2>
    
                    <div class="row justify-content-center">
    
                        <div class="col-3 dashboard-items">
                            <a href="{{route('managements.works.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/ejecucion-de-obras.png')}}" alt=""> <br>
    
                                Obras en ejecucion
                            </a>
                        </div>
                        
                        <div class="col-3 dashboard-items">
                            <a href="{{route('managements.requirements.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/requerimientos.png')}}" alt=""> <br>
                                Requerimientos de <br> Obra
                            </a>
                        </div>

                        <div class="col-3 dashboard-items">
                            <a href="{{route('managements.purchaseRequirements')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/orden-de-compra.png')}}" alt=""> <br>
                                Órdenes de <br> Compra
                            </a>
                        </div>

                        <div class="col-3 dashboard-items">
                            <a href="{{route('managements.inventories.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/kardex.png')}}" alt=""> <br>
                                Inventario <br> Almacenes
                            </a>
                        </div>
    
                    </div>
                </div>
    
                <div class="col-12 container-items">
    
                    <div class="row justify-content-center">
    
                        <div class="col-3 dashboard-items">
                            <a href="{{route('managements.users.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/usuario.png')}}" alt=""> <br>
                                Usuarios
                            </a>
                        </div>

                        <div class="col-3 dashboard-items">
                            <a href="{{route('managements.monitoringInternalRequirements.index')}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/requerimientos.png')}}" alt=""> <br>
                                Requerimientos Internos <br>
                                (Seguimiento)
                            </a>
                        </div>

                    </div>
                    
                </div>
    
            </div>
        </div>
    </section>

@endsection