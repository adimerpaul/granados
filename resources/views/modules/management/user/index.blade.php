@extends('layouts.app')

@section('content')

    <section class="users">
        <div class="container">

            <div class="row p-3">
                <div class="col-12">
                    <h3 class="text-center">
                        Lista de Usuarios
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a class="btn btn-outline-secondary" href="{{route('managements.dashboard')}}">
                        <i class="fas fa-arrow-left"></i>

                        Panel principal
                    </a>
                    <a class="btn btn-success" href="{{route('managements.users.create')}}">
                        <i class="fas fa-plus"></i>

                        Agregar usuario
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Obra</th>
                                <th scope="col">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @switch($user->role->name)
                                                @case('Gerencia')
                                                    <span style="border: 2px solid green; display:inline-block;padding:8px 10px;border-radius:8px;">
                                                        {{$user->role->name}}
                                                    </span>
                                                    @break
                                                @case('Logística')
                                                    <span style="border: 2px solid rgb(243, 193, 30); display:inline-block;padding:8px 10px;border-radius:8px;">
                                                        {{$user->role->name}}
                                                    </span>
                                                    @break
                                                @case('Contabilidad')
                                                    <span style="border: 2px solid rgb(204, 99, 7); display:inline-block;padding:8px 10px;border-radius:8px;">
                                                        {{$user->role->name}}
                                                    </span>
                                                    @break
                                                @default
                                                    <span style="display:inline-block;padding:8px 10px;border-radius:8px;">
                                                        {{$user->role->name}}
                                                    </span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            @if (!is_null($user->work))

                                                {{$user->work->name}}

                                            @endif
                                        </td>
                                        <td style="display: flex;gap:5px;">
                                            <a class="btn btn-primary" href="{{route('managements.users.edit', ['user' => $user->id])}}" style="display: inline-block">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{route('managements.users.destroy', ['user' => $user->id])}}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger" style="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
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