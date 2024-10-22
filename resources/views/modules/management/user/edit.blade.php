@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 p-2">
            <h3 class="text-center">
                Editar usuario: <strong>{{$user->name}}</strong>
            </h3>
        </div>

        <div class="col-md-8 p-3">
            <a class="btn btn-outline-secondary" href="{{route('managements.users.index')}}">
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
                    <form method="POST" action="{{ route('managements.users.update', ['user' => $user->id]) }}" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if (!is_null($user->work))
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Obra</label>

                                <div class="col-md-6">

                                    <select name="work_id" id="work_id" class="form-control @error('work_id') is-invalid @enderror" value="{{old('work_id')}}" required autocomplete="work_id">
                                        <option value="">Seleccionar la Obra ... </option>
                                        
                                            @foreach ($works as $work)
                                                <option value="{{$work->id}}" {{($work->id == $user->work->id) ? 'selected' : ''}}>{{$work->name}}</option>
                                            @endforeach
                                    </select>

                                    @error('work_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif


                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">

                                <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" value="{{old('role_id')}}" required autocomplete="role_id" disabled>
                                    
                                    <option>
                                        {{$user->role->name}}
                                    </option>
                                    
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

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
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
