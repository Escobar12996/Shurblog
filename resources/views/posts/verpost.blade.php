@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="jumbotron mb-5">
        <h1 class="display-4">{{ $post->tittle }}</h1>
        <p class="lead textopost">{!! $post->body !!}</p>

    </div>

    <div class="row justify-content-center ml-1 mr-1">
        <div class="col-12 text-center">
            <h1>Comentarios</h1>
        </div>
        <div class="col-12">
            @foreach( $messages as $message )
                <div class="row mb-3 mt-3 bg-white">
                    <div class="gris col-12 col-sm-5 col-lg-3 border border-rounded">
                        <div class="row justify-content-center text-center">
                            <div class="col-7 col-sm-12 col-md-8 col-lg-8">
                                <div class="card border-0 gris p-3">
                                    @if($message->user->image != '')
                                        <img class="card-img-top w-100" alt="{{ $message->user->name }}" src="{{ url('../'.Storage::url("app/imagenesUsuario/{$message->user->image}")) }}">
                                    @else
                                        <img class="card-img-top w-100" alt="{{ $message->user->name }}" src="{{ url('../'.Storage::url("app/imagenesUsuario/usuario.png")) }}">
                                    @endif
                                        <div class="card-body">
                                        <p class="card-text textome">{{$message->user->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 col-lg-9">{!! $message->message !!}</div>
                    @if(\Illuminate\Support\Facades\Auth::user() != null && $message->user->id === \Illuminate\Support\Facades\Auth::user()->id)
                        <div class="col-12 text-right">
                            <form action="{{ url('coment/del', ['mensaje' => $message->id]) }}" method="post"> @csrf <button class="btn btn-warning mt-1">Borrar</button></form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


    <div class="jumbotron mb-5">
        <h4 class="text-center">Comentar</h4>
        <form method="post" action="{{ url('coment', ['id' => $post->id]) }}">
            @csrf
            <div class="form-group row">
                <div class="col-12">
                    <textarea class="tiny" name="message" rows=10></textarea>
                    @error('message')
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


@endsection