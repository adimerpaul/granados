@extends('layouts.app')
@section('content')

    <section class="execution-of-works">
        <div class="container custom-container">
            
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Obras en ejecución
                    </h2>
                </div>
            </div>

            <div class="row justify-content-center pb-3">
                <div class="col-md-10">
                    <a class="btn btn-outline-secondary" href="{{route('managements.dashboard')}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createWorkModal">
                        <i class="fas fa-plus"></i>
                        Crear Obra
                    </button>
                    @include('modules.management.work.create')
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre Obra</th>
                                <th scope="col">Entidad Contratante</th>
                                <th scope="col">Plazo contractual</th>
                                <th scope="col">Ejecutor de obra</th>
                                <th scope="col">Costo Obra</th>
                                <th scope="col">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($works as $work)
                                <tr>
                                    <th scope="row">{{$work->id}}</th>
                                    <td>{{$work->name}}</td>
                                    <td>{{$work->entity}}</td>
                                    <td>
                                        {{$work->contractual_term}}
                                    </td>
                                    <td>
                                        {{$work->work_executor}}
                                    </td>
                                    <td>
                                        {{$work->work_cost}}
                                    </td>
                                    <td style="display: flex;gap:5px;">
                                        <button class="btn btn-info text-white" type="button" data-toggle="modal" data-target="#editWorkModal{{$work->id}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        
                                        <form action="{{route('managements.works.destroy', ['work' => $work->id])}}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>

                                            </button>
                                        </form>
                                        @include('modules.management.work.edit')
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