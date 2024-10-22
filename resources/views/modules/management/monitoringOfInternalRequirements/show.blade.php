@extends('layouts.app')

@section('content')

    <section class="show-internal-requirements">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">
                        Lista <br> <strong>( Requerimientos Internos )</strong>
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a class="btn btn-outline-secondary" href="{{route('managements.monitoringInternalRequirements.index')}}">
                        <i class="fas fa-arrow-left"></i>
                        Panel Principal
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
                                <th scope="col">Nº</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">U  |  M</th>
                                <th scope="col">Estado</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                              @foreach ($internalRequirement->internalRequiredProducts as $key => $internalRequiredProduct)
                                <tr>
                                    <th scope="row">
                                        <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                            {{$key + 1}}
                                        </span>
                                       
                                    </th>

                                    <td>
                                        <span style="color: rgb(38, 157, 101);">
                                            {{$internalRequiredProduct->product->name}}
                                        </span>
                                    </td>

                                    <td>
                                        <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                            {{$internalRequiredProduct->quantity}}     
                                        </span>
                                    </td>

                                    <td>
                                        {{$internalRequiredProduct->product->measure->symbol}}
                                    </td>
                                        
                                    <td>
                                        @if ($internalRequiredProduct->status == "Por despachar")

                                            <span style="display: inline-block;border-radius:5px;border: 2px solid red;color:red; padding:5px;">
                                                {{$internalRequiredProduct->status}}
                                            </span>

                                        @elseif ($internalRequiredProduct->status == "Despachado")

                                            <span style="display: inline-block;border-radius:5px;border: 2px solid green;color:green; padding:5px;">
                                                {{$internalRequiredProduct->status}}
                                            </span>

                                        @endif
                                    </td>

                                    {{-- <td>
                                        <form action="{{route('works.warehouses.internalRequirements.internalRequiredProduct.productDispatch', ['work' => Auth::user()->work->id, 'internalRequiredProduct' => $internalRequiredProduct->id] )}}" method="POST">
                                            @csrf

                                            <input class="btn btn-success" type="submit" value="Despachar">
                                        </form>
                                    </td> --}}
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