@extends('layouts.app')

@section('content')

    <section class="logistics-requirement-show">
        <div class="container-fluid custom-container">


            <div class="row">
                <div class="col-12">

                    {{-- Requirement information --}}

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <h3 class="text-center" style="font-weight: bolder;">
                                REQUERIMIENTO DE OBRA
                            </h3>
                            <h3 class="text-center mb-4">
                                <span style="color: rgb(174, 11, 174);font-weight:bolder;">
                                    <strong>{{$requirement->work->name}}</strong>
                                </span>
                            </h3>
                            @include('modules.logistics.requirement.info')
                        </div>
                    </div>

                    {{-- Back  --}}

                    <div class="row justify-content-center pb-3">
                        <div class="col-md-12">
                            <a class="btn btn-outline-secondary" href="{{route('workRequirements.index')}}">
                                <i class="fas fa-arrow-left"></i>
        
                                Atrás
                            </a>
                        </div>
                    </div>
                    
                    {{-- Separator --}}

                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Requirement content --}}

            <div class="row">

                {{-- Left --}}

                <div class="col-md-6">

                    {{-- Works Requirement --}}

                    

                    {{-- Dispatch Riquerement--}}

                    @include('modules.logistics.requirement.PurchaseDispatchRequirement')

                    @if ($requirement->status == 'Gestionando')
                        <div class="row">
                            <div class="col-12 text-center">
                                <a class="btn btn-success" href="{{route('workRequirement.status.update', ['requirement' => $requirement->id])}}">
                                    Generar Compras y/o Despachos
                                </a>
                            </div>
                        </div>
                    @endif

                </div>

                {{-- Rigth --}}

                <div class="col-md-6">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                                
                            @livewire('search-product-logistics', ['requirement' => $requirement])
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection