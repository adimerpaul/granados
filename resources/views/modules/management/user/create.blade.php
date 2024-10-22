@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 p-2">
            <h3 class="text-center">
                Datos de nuevo usuario
            </h3>
        </div>

        <div class="col-md-8 p-3">
            <a class="btn btn-secondary" href="{{route('managements.users.index')}}">
                Atrás
            </a>
        </div>

        <div class="col-md-8 p-2">
            <h3 class="text-center">
                <hr>
            </h3>
        </div>

        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('managements.users.store') }}" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="work_id" class="col-md-4 col-form-label text-md-right">Obra</label>

                            <div class="col-md-6">

                                <select name="work_id" id="work_id" class="form-control @error('work_id') is-invalid @enderror" value="{{old('work_id')}}" required autocomplete="work_id">
                                    <option value="">Seleccionar la Obra ... </option>
                                    @foreach ($works as $work)
                                        <option value="{{$work->id}}">{{$work->name}}</option>
                                    @endforeach
                                </select>

                                @error('work_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Role --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">

                                <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" value="{{old('role_id')}}" required autocomplete="role_id">
                                    
                                    <option value="4">Residente de obra</option>
                                    <option value="5">Administrador de Almacén</option>
                                    
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
