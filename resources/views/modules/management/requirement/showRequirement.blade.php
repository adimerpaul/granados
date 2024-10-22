@extends('layouts.app')

@section('content')

    <section class="requirement-magament-show">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4 class="">
                        Requeremiento de Materiales: <strong>{{$requirement->work->name}}</strong>
                        <br>
                        Código: <strong>{{$requirement->code}}</strong>
                        <br>
                        Requerido por: <strong>{{$requirement->user->name}}</strong>
                        <br>
                        Tipo de pedido: <strong>{{$requirement->type}}</strong>
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-8">
                    <a class="btn btn-outline-secondary" href="{{route('managements.requirements.index')}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                </div>
                <div class="col-md-2" style="text-align: end;">
                    <a class="btn btn-success" href="">
                        <i class="fas fa-file-alt"></i>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Unidad/Medida</th>
                                <th scope="col">Observacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requiredProducts as $key => $requiredProduct)
                                <tr>
                                    <td>
                                        <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                            {{$key + 1}}
                                        </span>
                                    </td>
                                    <td>
                                        {{$requiredProduct->product->name}}
                                    </td>
                                    <td>
                                        <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                            {{$requiredProduct->quantity}}  
                                        </span>
                                    </td>
                                    <td>
                                        {{$requiredProduct->product->measure->symbol}}
                                    </td>
                                    <td>
                                        @if ($requiredProduct->observation != null)
                                                {{$requiredProduct->observation}}
                                            @else
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editObervationModal{{$requiredProduct->id}}">
                                                    <i class="fas fa-plus"></i>
                                                    Agregar
                                                </button>
                                            @include('modules.management.requirement.modalEditObservation')
                                        @endif
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    
                    <a class="btn btn-danger" href="{{route('management.requirement.disapprove', ['requirementId' => $requirement->id])}}">
                        Desaprobar
                    </a>
                    <a class="btn btn-success" href="{{route('management.requirement.approve', ['requirementId' => $requirement->id])}}">
                        Aprobar
                    </a>
                    
                </div>
            </div>

            
        </div>
    </section>

@endsection