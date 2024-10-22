@extends('layouts.app')

@section('content')

    <section class="logistics-requirements">

        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h2 class="text-center">
                                Requerimientos de Obras
                            </h2>
                        </div>
                    </div>
        
                    <div class="row justify-content-center pb-3">
                        <div class="col-md-10">
                            <a class="btn btn-outline-secondary" href="{{route('logistics.dashboard')}}">
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
                                        <th scope="col">Código Req</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($requirements as $requirement)
                                        <tr>
                                            <td>
                                                <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                                    {{$requirement->id}}
                                                </span>
                                            </td>
                                            <td>
                                                {{$requirement->work->name}}
                                            </td>
                                            <th>
                                                {{$requirement->code}}
                                            </th>
                                            <td>
                                                {{$requirement->user->name}}
                                            </td>

                                            <td>
                                                @if ($requirement->status == 'Comprando y/o Despachando')
                                                    <a class="status" href="" style="border:2px solid rgb(181, 8, 181);color:rgb(181, 8, 181);">
                                                        {{$requirement->status}}
                                                    </a>
                                                @elseif ($requirement->status == 'Atendido')
                                                    <a class="status" href="" style="border:2px solid green;color:green;">
                                                        {{$requirement->status}}
                                                    </a>
                                                @endif
                                            </td>

                                            <td>
                                                <a class="btn btn-primary text-white" href="{{route('workRequirements.show', ['requirementId' => $requirement->id])}}">
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
            </div>
        </div>

    </section>

@endsection