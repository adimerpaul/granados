@extends('layouts.app')

@section('content')

    <section class="requirement-management">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Ordenes de Compra
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('managements.dashboard')}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
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
                                {{-- <th scope="col">Acciones</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchaseOrders as $purchaseOrder)
                                    <tr>
                                        <th>{{$purchaseOrder->code}}</th>
                                        
                                        <td>{{$purchaseOrder->user->name}}</td>
                                        <td>
                                            
                                            @if($purchaseOrder->status == 'Comprado')
                                                <a class="status" style="border: 2px solid green;color:green;">
                                                    {{$purchaseOrder->status}}
                                                </a>
                                            @elseif ($purchaseOrder->status == 'Por comprar')
                                                <a class="status" style="border: 2px solid red;color:red;">
                                                    {{$purchaseOrder->status}}
                                                </a>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <a 
                                                class="btn btn-primary text-white" 
                                                href="{{-- {{route('works.warehouses.dispatchs.showRequirement', ['work' => Auth::user()->work_id, 'requirementId' => $purchaseOrder->requirement->id])}} --}}">

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