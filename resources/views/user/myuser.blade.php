@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')
        <div class="row justify-content-center">
            <div class="col-8 mt-5">
                <div class="card">
                    <div class="card-header  text-center bg-dark text-white">Editar Usuario</div>
                        <div class="card-body">
                            <form method="post" action="{{ url('myuser') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="user" class="col-md-4 col-form-label text-md-right">Usuario</label>

                                    <div class="col-md-6">
                                        <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ $usuario->user }}" required autocomplete="user" autofocus>
                                        @error('user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-center justify-content-center">
                                    <button type="submit" class=" col-md-3 btn btn-primary">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    <div class="card-header  text-center bg-dark text-white">Editar Imagen</div>
                    <div class="card-body">
                        <form method="post" action="{{ url('myuser/img') }}" enctype="multipart/form-data">
                            @csrf
                            @if($usuario->image !== "")
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-3">
                                        <img class="rounded mx-auto d-block img-thumbnail" src="{{ url('../'.Storage::url("app/imagenesUsuario/{$usuario->image}")) }}">
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>

                                <div class="col-md-6">
                                    <input id="image" accept="image/*" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $usuario->image }}" required autocomplete="user" autofocus>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row text-center justify-content-center">
                                <button type="submit" class=" col-md-3 btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                <div class="card-header  text-center bg-dark text-white">Editar Contraseña</div>
                <div class="card-body">
                    <form method="post" action="{{ url('myuser/pass') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="passwordv" class="col-md-4 col-form-label text-md-right">Contraseña Antigua</label>

                            <div class="col-md-6">
                                <input id="passwordv" type="password" class="form-control @if($notice ?? '') is-invalid @endif" name="passwordv" required autocomplete="user" autofocus>
                                @if($notice ?? '')
                                    {{ $notice }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passwordn" class="col-md-4 col-form-label text-md-right">Contraseña Nueva</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="user" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Repite Contraseña</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="user" autofocus>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row text-center justify-content-center">
                            <button type="submit" class=" col-md-3 btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
@endsection