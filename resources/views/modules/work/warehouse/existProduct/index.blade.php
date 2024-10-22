@extends('layouts.app')

@section('content')

    <section class="exit-product-warehouse">
        <div class="container custom-container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Salida de productos:  <br> <strong>{{ "(" . Auth::user()->work->name . ")"}}</strong>
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
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad Retirada <br> de Almacen</th>
                                <th scope="col">U | M</th>
                                <th scope="col">Fecha de salida</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($exitProductsWarehouse as $exitProductWarehouse)
                                <tr>
                                    <td>
                                        <span style="text-align: center;width:40px;height:40px;display:inline-block;border:1px solid #000000;border-radius:50%;padding-top:8px;">
                                            {{$exitProductWarehouse->id}}
                                        </span>
                                    </td>

                                    <th>
                                        {{$exitProductWarehouse->product->name}}
                                    </th>

                                    <th scope="row">
                                        <span style="padding: 5px 8px;display:inline-block;border:1px solid #000;width:70px;">
                                            {{$exitProductWarehouse->quantity_removed_from_inventory}}
                                        </span>
                                    </th>

                                    <th>
                                        {{$exitProductWarehouse->product->measure->symbol}}
                                    </th>

                                    <td>
                                        {{$exitProductWarehouse->departure_date}}
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