@extends('layouts.app')
@section('title', 'Crear Post')
@section('content')

<div class="card">
    <div class="card-header  text-center bg-dark text-white">Enviar Post</div>
        <div class="card-body">
            <form method="post" action="{{ url('sendpost') }}">
                @csrf
                <div class="form-group row">
                    <label for="user" class="col-12 col-form-label text-md-center">Titulo</label>

                    <div class="col-12">
                        <input id="user" type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" value="{{ old('tittle') }}" required autocomplete="user" autofocus>
                        @error('tittle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-12 col-form-label text-md-center">Noticia</label>

                    <div class="col-12">
                        <textarea class="tiny @error('body') is-invalid @enderror" name="body" rows=25>{{ old('body') }}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection