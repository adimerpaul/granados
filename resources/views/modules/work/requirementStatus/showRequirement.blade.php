@extends('layouts.app')

@section('content')

    <section class="requirement-magament-show">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4 class="text-center">
                        Requeremiento de Materiales: <strong>{{"( " . $requirement->work->name . " )"}}</strong>
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('works.requirements.status', ['work' => Auth::user()->work_id])}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N° Prod Req</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Unidad/Medida</th>
                                <th scope="col">Observacion</th>
                                <th scope="col">Acciónes</th>
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
                                    <td>{{$requiredProduct->product->name}}</td>
                                    <td>{{$requiredProduct->quantity}}</td>
                                    <td>{{$requiredProduct->product->measure->symbol}}</td>
                                    <td>
                                        @if ($requiredProduct->observation != null)
                                                <span style="display: inline-block;border:2px solid red;border-radius:10px;padding:8px 10px;">
                                                    {{$requiredProduct->observation}}
                                                </span>
                                            @else
                                                <span>
                                                    Sin observacion
                                                </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-group" style="display: inline-block">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editRequiredProductStatusModal{{$requiredProduct->id}}">
                                                <i class="fas fa-edit"></i>
                                                
                                            </button>
    
                                            @include('modules.work.requirementStatus.editRequirement')
                                        </div>

                                        <form action="{{route('works.destroyRequiredProductStatus', ['work' => Auth::user()->work_id, 'requiredProductId' => $requiredProduct->id])}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="X">
                                        </form>
                                        
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
                @if ($requirement->status == "En Revision")
                    <div class="col-md-10 text-center">
                        
                        <form action="{{route('works.sendRequirementsForwarding', ['work' => Auth::user()->work_id, 'requirementId' => $requirement->id])}}" method="POST">
                            @csrf

                            <input class="btn btn-success" type="submit" value="Reenviar requerimiento">
                                
                        </form>
                        
                    </div>
                @endif
            </div>

            
        </div>
    </section>

@endsection