@extends('layouts.app')
@section('title', 'Verifica el Correo')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Verifica tu Correo Electrónico') }}</div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Se ha mandado un correo de verificacion') }}
                    </div>
                @endif

                {{ __('Para seguir navegando confirma tu correo') }}
                {{ __('Si no lo ha recibido') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' Reenviar') }}</button>.
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
