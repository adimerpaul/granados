@extends('layouts.app')

@section('content')

    <section class="requirement-status">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Requerimientos Internos <br>
                        de Obras
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
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Obra</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($internalRequirements as $internalRequirement)
                                <tr>
                                    <td>
                                        <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                            {{$internalRequirement->id}}
                                        </span>
                                    </td>
                                    <td>
                                        {{$internalRequirement->work->name}}
                                        
                                    </td>

                                    <th scope="row">
                                        {{$internalRequirement->user->name}}
                                    </th>

                                    <td>
                                        
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
                                        <a class="btn btn-primary text-white" href="{{route('managements.monitoringInternalRequirements.show', ['internalRequirement' => $internalRequirement->id])}}">
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