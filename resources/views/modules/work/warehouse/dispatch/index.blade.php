@extends('layouts.app')

@section('content')

    <section class="warehouse-dispatch">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        DESPACHOS de <br>
                        Logística
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('works.dashboard', ['work' => Auth::user()->work->name])}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                    {{-- <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createWorkModal">
                        <i class="fas fa-plus"></i>
                        Crear Obra
                    </button>
                    @include('modules.work.create') --}}
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-danger text-white">
                              <tr>
                                <th scope="col">Código <br> Ord Compra</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($requirements as $requirement)
                                    <tr>
                                        <th>{{$requirement->purchaseOrder->code}}</th>
                                        
                                        <td>{{$requirement->purchaseOrder->user->name}}</td>
                                        <td>
                                            
                                            @if($requirement->purchaseOrder->status == 'Comprado')
                                                <a class="status" style="border: 2px solid green;color:green;">
                                                    {{$requirement->purchaseOrder->status}}
                                                </a>
                                            @elseif ($requirement->purchaseOrder->status == 'Por comprar')
                                                <a class="status" style="border: 2px solid red;color:red;">
                                                    {{$requirement->purchaseOrder->status}}
                                                </a>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <a 
                                                class="btn btn-primary text-white" 
                                                href="{{route('works.warehouses.dispatchs.showRequirement', ['work' => Auth::user()->work_id, 'requirementId' => $requirement->id])}}">
    
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