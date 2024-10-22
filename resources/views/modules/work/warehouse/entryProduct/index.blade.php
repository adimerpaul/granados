@extends('layouts.app')

@section('content')

    <section class="entry-product-warehouse">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Entrada de productos:  <br> <strong>{{ "(" . Auth::user()->work->name . ")"}}</strong>
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('works.dashboard', ['work' => Auth::user()->work_id])}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createProductModalEntryProduct">
                        + Agregar Producto
                    </button>
                    @include('modules.work.warehouse.entryProduct.createProductEntryProductModal')
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad Ingresada <br> Almacén</th>
                                <th scope="col">U | M</th>
                                <th scope="col">Fecha de ingreso</th>
                                {{-- <th scope="col">Acciones</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($entryProductsWarehouse as $entryProductWarehouse)
                                <tr>
                                    <td>
                                        <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                            {{$entryProductWarehouse->id}}
                                        </span>
                                    </td>

                                    <th>
                                        {{$entryProductWarehouse->product->name}}
                                    </th>

                                    <th scope="row">
                                        <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                            {{$entryProductWarehouse->quantity_entered}}
                                        </span>
                                    </th>

                                    <th>
                                        {{$entryProductWarehouse->product->measure->symbol}}
                                    </th>

                                    <td>
                                        {{$entryProductWarehouse->date_of_admission}}
                                    </td>

                                    {{-- <td>
                                        
                                        @if ($internalRequirement->status == 'Incompleto')
                                            <a class="status" href="" style="border: 2px solid red;color:red;">
                                                {{$internalRequirement->status}}
                                            </a>
                                        @elseif ($internalRequirement->status == 'Completo')
                                            <a class="status" href="" style="border: 2px solid green;color:green;">
                                                {{$internalRequirement->status}}
                                            </a>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <a class="btn btn-primary text-white" href="{{route('works.warehouses.internalRequirements.show', ['work' => Auth::user()->work_id, 'internalRequirement' => $internalRequirement->id])}}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td> --}}
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