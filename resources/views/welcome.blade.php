@extends('layouts.app')
@section('title', 'Home')
@section('content')

    {{-- Jumbotron de inicio --}}
    <div class="jumbotron mb-5">
        <h1 class="display-4">Bienvenido a ShurBlog</h1>
        {{-- <p class="lead">En este blog se suben articulos informativos de juegos, </p> --}}
        <hr class="my-4">
    </div>

    {{-- Bucle Muestra los posts --}}
    @if(count($posts) < 1)
        <div class="jumbotron mb-5">
            <h1 class="display-4">Aun no hay posts....</h1>
            <p class="lead">Nuestros editores son tan perros que no han querido hacer posts... pide a
            un administrador que te haga editor para que puedas subir alguno....</p>
            <hr class="my-4">
        </div>
    @else
        @foreach($posts as $post)
            <div class="jumbotron">
                <h1 class="display-4">{{$post->tittle}}</h1>
                <hr class="my-4">

                {{-- Limito a solo 450 palabras el posts --}}
                {!! \Illuminate\Support\Str::limit($post->body, 450, $end = '...') !!}
                <p class="lead">
                    {{-- Boton para leer mas --}}
                    <a class="btn btn-primary btn-lg" href="{{ url('viewpost', ['post' => $post->id]) }}" role="button">Leer Mas</a>
                </p>

                {{-- Boton para editar posts --}}
                @if(\Illuminate\Support\Facades\Auth::user() != null && $post->user->id === \Illuminate\Support\Facades\Auth::user()->id)
                    <div class="col-12 text-right">
                        <a class="btn btn-primary btn-lg" href="{{ url('editpost', ['post' => $post->id]) }}">Editar</a>
                    </div>
                @endif

            </div>
        @endforeach
    @endif

    {{-- Estos son los botones para ir para adelante y para atras --}}
    @if (count($posts))
        {{ $posts->links() }}
    @endif

@endsection
