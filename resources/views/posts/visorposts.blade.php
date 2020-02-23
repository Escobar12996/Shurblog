@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Titulo del Post</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
            {{-- Bucle Muestra los posts --}}
            @if(count($posts) < 1)
                <tr>
                    <th scope="row" colspan="2" class="text-center">
                        Ups. Esto esta muy vacio...
                    </th>
                </tr>
            @else
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->tittle}}</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->type === 'Administrador')
                        <td><a class="btn btn-primary btn-lg" href="{{ url('deletepost', ['post' => $post->id]) }}">Eliminar</a></td>
                        @else
                        <td><a class="btn btn-primary btn-lg">No tienes Permisos</a></td>
                        @endif
                        <td><a class="btn btn-primary btn-lg" href="{{ url('editpost', ['post' => $post->id]) }}">Editar</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{-- Estos son los botones para ir para adelante y para atras --}}
    @if (count($posts))
        {{ $posts->links() }}
    @endif


@endsection