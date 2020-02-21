@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <div class="jumbotron mb-5">
        <h1 class="display-4">Bienvenido a ShurBlog</h1>
        <!--<p class="lead">En este blog se suben articulos informativos de juegos, </p>-->
        <hr class="my-4">
    </div>

    @foreach($posts as $post)
        <div class="jumbotron">
            <h1 class="display-4">{{$post->tittle}}</h1>
            <hr class="my-4">
            {!! \Illuminate\Support\Str::limit($post->body, 450, $end = '...') !!}
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('viewpost', ['post' => $post->tittle]) }}" role="button">Leer Mas</a>
            </p>
        </div>
    @endforeach


    @if (count($posts))
        {{ $posts->links() }}
    @endif

@endsection
