@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="card">
    <div class="card-header  text-center bg-dark text-white">Enviar Post</div>
        <div class="card-body">
            <form method="post" action="{{ url('editpost', $post->id ) }}">
                @csrf
                <div class="form-group row">
                    <label for="tittle" class="col-12 col-form-label text-md-center">Titulo</label>

                    <div class="col-12">
                        <input id="tittle" type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" required autocomplete="user" value="{{ $post->tittle }}" autofocus>
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
                        <textarea class="tiny" name="body" rows=25>{{ $post->body }}</textarea>
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