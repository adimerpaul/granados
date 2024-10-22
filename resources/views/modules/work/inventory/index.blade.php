@extends('layouts.app')

@section('content')

    <section class="inventory">
        <div class="container">

            <div class="row p-2">
                <div class="col-12">
                    <h2 class="text-center">
                        Existencia de Productos
                        
                    </h2>
                    <h3 class="text-center">
                        Obra: <strong>{{Auth::user()->work->name}}</strong>
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    
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

            @livewire('inventory')
            
        </div>
    </section>

@endsection