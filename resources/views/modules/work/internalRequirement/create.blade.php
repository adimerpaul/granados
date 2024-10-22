@extends('layouts.app')

@section('content')

    <section class="requirement">
        <div class="container-fluid custom-container">

            <div class="row pb-2">

                <div class="col-12">
                    <h3 class="text-center">
                        REQUERIMIENTOS ( <strong>{{Auth::user()->name}}</strong> )
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
                    <a class="btn btn-outline-secondary" href="{{route('works.dashboard', ['work' => Auth::user()->work_id])}}">
                        Atrás
                    </a> 
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                        
                    <div class="row">

                        {{-- Left --}}

                        <div class="col-md-6">

                            @livewire('search-product-works-internal-requirement')

                        </div>

                        {{-- Right --}}

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-center p-4">
                                        Requerimientos <br>
                                        <strong>(Almacén interno)</strong>
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
                                    @if (!empty($internalRequirement))
                                        @foreach ($internalRequirement->internalRequiredProducts as $key => $internalRequiredProduct)
                                            <tr>
                                                <th scope="row">{{$key + 1}}</th>
                                                <td>{{$internalRequiredProduct->product->name}}</td>
                                                <td>{{$internalRequiredProduct->product->measure->symbol}}</td>
                                                <td>
                                                    <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                                        {{$internalRequiredProduct->quantity}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="{{route('works.internalRequirements.internalRequiredProduct.destroy', ['work' => Auth::user()->work_id, 'internalRequiredProduct' => $internalRequiredProduct->id ])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <input class="btn btn-danger" type="submit" value="x">

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if (Session::has('internalRequirementId'))
                                <form action="{{route('works.internalRequirements.send', ['work' => Auth::user()->work_id, 'internalRequirement' => Session::get('internalRequirementId')])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit" value="Solicitar a Almacén">
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