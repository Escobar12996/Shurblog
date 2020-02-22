@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre Usuario</th>
            <th scope="col">Cambiar</th>
        </tr>
        </thead>
        <tbody>
        {{-- Bucle Muestra los posts --}}
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->user}}</th>
                <td>{{$usuario->name}}</td>
                <td>Cambiar</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Estos son los botones para ir para adelante y para atras --}}
    @if (count($usuario))
        {{ $posts->links() }}
    @endif


@endsection