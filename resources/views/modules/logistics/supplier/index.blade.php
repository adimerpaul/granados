@extends('layouts.app')

@section('content')

    <section class="warehouse">
        <div class="container custom-container">

            <div class="row p-2 justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Lista de Proveedores
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('logistics.dashboard')}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createSupplierModal">
                        <i class="fas fa-plus"></i>
                        Agregar proveedor
                    </button>
                    @include('modules.logistics.supplier.createModal')
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
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Nombre de proveedor</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Ruc</th>
                                <th scope="col">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>
                                        {{$supplier->name}}
                                    </td>
                                    <td>
                                        {{$supplier->phone}}
                                    </td>
                                    <td>
                                        {{$supplier->ubication}}
                                    </td>
                                    <td>
                                        {{$supplier->ruc}}
                                    </td>
                                    <td>
                                        <a 
                                        class="btn btn-info text-white" 
                                        type="button" 
                                        data-toggle="modal" 
                                        data-target="#editSupplierModal{{$supplier->id}}"
                                        style="display: inline-block">
                                            <i class="fas fa-pencil-alt"></i>
                                            
                                        </a>

                                        <form action="{{route('logistics.suppliers.destroy', $supplier->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" class="btn btn-danger" value="X">
                                        </form>

                                        @include('modules.logistics.supplier.editModal')
                                        
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