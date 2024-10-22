@extends('layouts.app')

@section('content')

    <section class="inventory">
        <div class="container-fluid">

            <div class="row justify-content-center p-2">
                <div class="col-md-10">
                    <h2 class="text-center">
                        Inventarios
                        
                    </h2>
                    <h3 class="text-center">
                        <strong>( Almacenes )</strong>
                    </h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    
                    <a class="btn btn-outline-secondary" href="{{route('managements.dashboard')}}">
                        <i class="fas fa-arrow-left"></i>
                        Panel principal
                    </a>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <hr>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">

                        <div class="col-md-2">
                            @foreach ($works as $work)
                                <a href="#" onclick="updateWorkId({{ $work->id }})" style="color:#ffffff;text-decoration:none;">
                                    <div class="row">
                                        <div class="col-12 text-center mb-1 link-work">
                                            <span>
                                                {{$work->name}}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                        <div class="col-md-10">

                                @livewire('show-inventory-for-management')

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        function updateWorkId(workId) {
            Livewire.emit('updateWorkId', workId);
        }
    </script>
@endsection