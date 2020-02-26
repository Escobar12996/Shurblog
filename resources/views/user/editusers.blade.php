@extends('layouts.app')
@section('title', 'Editar Usuarios')
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre Usuario</th>
            <th scope="col">Correo</th>
            <th scope="col">Cambiar tipo usuario</th>
        </tr>
        </thead>
        <tbody>
        {{-- Bucle Muestra los posts --}}
        @foreach($usuarios as $usuario)
            <tr>
                <th scope="row">
                    @if($usuario->id != 1)
                    <form action="{{ url('user/edituseradmin', $usuario->id) }}" method="post">
                        @csrf
                        <input type="text" name="user" class="form-control @error('user') is-invalid @enderror" value="{{$usuario->user}}">
                        <button class="btn btn-secondary btn-block" type="submit">Editar</button>
                    </form>
                    @else
                        {{$usuario->user}}
                    @endif
                </th>
                <td>
                    @if($usuario->image !== "" && $usuario->id != 1)
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <img class="rounded mx-auto d-block img-thumbnail" src="{{ url('../'.Storage::url("app/imagenesUsuario/{$usuario->image}")) }}">
                            </div>
                            <div class="col-12 col-md-6">
                                <form action="{{ url('user/delimage', $usuario->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-secondary" type="submit">Borrar</button>
                                </form>
                            </div>
                        </div>
                    @elseif($usuario->image !== "")
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <img class="rounded mx-auto d-block img-thumbnail" src="{{ url('../'.Storage::url("app/imagenesUsuario/{$usuario->image}")) }}">
                            </div>
                        </div>
                    @endif

                </td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    @if($usuario->id != 1)
                    <form action="{{ url('user/chtype', $usuario->id) }}" method="post">
                        @csrf
                        <select class="form-control"   name="type">
                            <option value="Basico" @if($usuario->type == 'Basico') selected @endif>Basico</option>
                            <option value="Editor" @if($usuario->type == 'Editor') selected @endif>Editor</option>
                            <option value="Administrador" @if($usuario->type == 'Administrador') selected @endif>Administrador</option>
                        </select>
                        <button class="btn btn-secondary btn-block" type="submit">Actualizar</button>
                    </form>
                        @else
                    Administrador
                    @endif
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