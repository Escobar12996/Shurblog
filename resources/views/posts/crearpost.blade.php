@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="card">
    <div class="card-header  text-center bg-dark text-white">Enviar Post</div>
        <div class="card-body">
            <form method="post" action="{{ url('sendpost') }}">
                @csrf
                <div class="form-group row">
                    <label for="user" class="col-12 col-form-label text-md-center">Titulo</label>

                    <div class="col-12">
                        <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="tittle" required autocomplete="user" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-12 col-form-label text-md-center">Noticia</label>

                    <div class="col-12">
                        <textarea class="tiny" name="body" rows=25></textarea>
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