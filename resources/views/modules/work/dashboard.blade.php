@extends('layouts.app')
@section('content')

    <section class="warehouse">
        <div class="container-fluid dashboard custom-container">

            <div class="row justify-content-center">
                <div class="col-12 col-xl-10 mb-5">

                    {{-- Ejecución de Obra --}}

                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">
                                Ejecución de obra: <strong>{{Auth::user()->work->name}}</strong>
                            </h2>
                        </div>
                    </div>

                    <div class="row justify-content-center">
    
                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.requirements', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/requerimientos.png')}}" alt=""> <br>
    
                                Requerimientos <br> de <br> Compra
                            </a>
                        </div>
                        
                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.internalRequirements.create', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/requerimientos.png')}}" alt=""> <br>
    
                                Requerimientos <br> Internos
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.requirements.status', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/estado-requerimiento.png')}}" alt=""> <br>
                                Estado de requerimiento <br> de Compra
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.internalRequirements.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/estado-requerimiento.png')}}" alt=""> <br>
                                Estado de <br> Requerimientos Internos
                            </a>
                        </div>

                        <div class="col-2 dashboard-items" >
                            <a href="{{route('works.inventory.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/kardex.png')}}" alt=""> <br>
                                Existencia <br>
                                (Kárdex)
                            </a>
                        </div>

                    </div>

                    {{-- Warehouse --}}

                    <div class="row pt-5">
                        <div class="col-12">
                            <h2 class="text-center">
                                Almacén: <strong>{{Auth::user()->work->name}}</strong> <br>
                            </h2>
                        </div>
                    </div>

                    <div class="row justify-content-center">
    
                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.warehouses.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/kardex.png')}}" alt=""> <br>
                                Existencia <br>
                                (Kárdex)
                            </a>
                        </div>
                        
                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.warehouses.dispatchs.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/despachos.png')}}" alt=""> <br>
                                Despachos de <br> Logística
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.warehouses.dispatchOrders.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/despachos.png')}}" alt=""> <br>
                                Órdenes de <br> Despacho
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.warehouses.internalRequirements.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/requerimientos.png')}}" alt=""> <br>
                                Requerimientos <br> Internos
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.warehosues.entryProductWarehouse.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/entradas.png')}}" alt=""> <br>
                                Entradas
                            </a>
                        </div>

                        <div class="col-2 dashboard-items">
                            <a href="{{route('works.warehosues.exitProductWarehouse.index', ['work' => Auth::user()->work_id])}}" style="border: 2px solid #cacaca;background-color:transparent;color:#000;">
                                <img src="{{asset('images/icons/salidas.png')}}" alt=""> <br>
                                Salidas
                            </a>
                        </div>
    
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection