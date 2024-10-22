@extends('layouts.app')

@section('content')

    <section class="requirement">
        <div class="container-fluid custom-container">

            <div class="row pb-2">

                <div class="col-12">
                    <h3 class="text-center">
                        REQUERIMIENTOS DE COMPRA ( <strong>{{Auth::user()->name}}</strong> ) <br>
                        <span style="color: rgb(174, 11, 174);font-weight:bolder;">
                            {{Auth::user()->work->name}}
                        </span>
                    </h3>
                </div>

            </div>

            {{-- Separator --}}

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                        
                    <div class="row">

                        {{-- Left --}}

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-outline-secondary" href="{{route('works.dashboard', ['work' => Auth::user()->work_id])}}">
                                        Atrás
                                    </a>
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createProductModal">
                                        Agregar Producto
                                    </button>
                                
                                    @include('modules.work.requirement.createProductModal')
                                    
                                </div>
                            </div>
                            
                            @livewire('search-product-works-requirement')

                        </div>

                        {{-- Right --}}

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-center p-4">
                                        Productos Requeridos
                                    </h4>
                                </div>
                            </div>

                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">U / M</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requiredProducts as $key => $requiredProduct)
                                        <tr>
                                            <th scope="row">
                                                {{$key + 1}}
                                            </th>
                                            <td>
                                                {{$requiredProduct->product->name}}
                                            </td>
                                            <td>
                                                {{$requiredProduct->product->measure->symbol}}
                                            </td>
                                            <td>
                                                <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                                    {{$requiredProduct->quantity}}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{route('requiredProducts.destroy', ['requiredProduct' => $requiredProduct->id,'work' => Auth::user()->work_id] )}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input class="btn btn-danger" type="submit" value="x">

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (Session::has('requirementId'))
                                <form action="{{route('works.requirements.send', ['requirementId' => Session::get('requirementId'), 'work' => Auth::user()->work_id])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit" value="Enviar Requerimiento">
                                    </div>
                                </form>
                            @endif

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection