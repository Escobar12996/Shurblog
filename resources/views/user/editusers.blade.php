@extends('layouts.app')
@section('title', 'Home')
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre Usuario</th>
            <th scope="col">Cambiar tipo usuario</th>
        </tr>
        </thead>
        <tbody>
        {{-- Bucle Muestra los posts --}}
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->user}}</th>
                <td>{{$usuario->name}}</td>
                <td>
                    <form action="{{ url('user/chtype', $usuario->id) }}" method="post">
                        @csrf
                        <select name="type">
                            <option value="Basico" @if($usuario->type == 'Basico') selected @endif>Basico</option>
                            <option value="Editor" @if($usuario->type == 'Editor') selected @endif>Editor</option>
                            <option value="Administrador" @if($usuario->type == 'Administrador') selected @endif>Administrador</option>
                        </select>
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- Estos son los botones para ir para adelante y para atras --}}
    @if (count($usuarios))
        {{ $usuarios->links() }}
    @endif


@endsection