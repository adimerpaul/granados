@extends('layouts.app')

@section('content')

    <section class="requirement-status">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Requerimientos Internos <br> <strong>{{ "(" . Auth::user()->work->name . ")"}}</strong>
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('works.dashboard', ['work' => Auth::user()->work_id])}}">
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
                                <th scope="col">Responsable</th>
                                <th scope="col">Almacén</th>
                                <th scope="col">Estado <br> (Despacho)</th>
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

                                    <th scope="row">
                                        {{$internalRequirement->user->name}}
                                    </th>

                                    <td>
                                        {{$internalRequirement->work->name}}
                                    </td>

                                    <td>
                                        
                                        @if ($internalRequirement->status == 'Por Despachar')
                                            <a class="status" href="" style="border: 2px solid red;color:red;">
                                                {{$internalRequirement->status}}
                                            </a>
                                        @elseif ($internalRequirement->status == 'Despachado')
                                            <a class="status" href="" style="border: 2px solid green;color:green;">
                                                {{$internalRequirement->status}}
                                            </a>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <a class="btn btn-primary text-white" href="{{route('works.internalRequirements.show', ['work' => Auth::user()->work_id, 'internalRequirement' => $internalRequirement->id])}}">
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