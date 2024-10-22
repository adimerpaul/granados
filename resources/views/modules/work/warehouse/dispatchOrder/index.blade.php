@extends('layouts.app')

@section('content')

    <section class="warehouse">
        <div class="container custom-container">

            <div class="row p-2 justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Lista de Órdenes de <br>
                        Despacho
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('works.dashboard', ['work' => Auth::user()->work->id])}}">
                        <i class="fas fa-arrow-left"></i>
                        Panel principal
                    </a>
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
                            <thead class="bg-success text-white">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Obra <br> Solicitante</th>
                                <th scope="col">Codigo</th>
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
                                    <td>
                                        {{$requirement->code}}
                                    </td>
                                    <td>
                                        {{$requirement->user->name}}
                                    </td>
                                    <td>
                                        @if($requirement->status == 'Comprando y/o Despachando')
                                            <a class="status" href="" style="border:2px solid rgb(181, 8, 181);color:rgb(181, 8, 181);">
                                                {{$requirement->status}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('works.warehouses.dispatchOrders.show', ['work' => Auth::user()->work->id ,'requirement' => $requirement->id])}}" class="btn btn-info text-white">
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