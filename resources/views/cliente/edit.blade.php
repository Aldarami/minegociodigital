@extends('plantillas.app')

@section('title')
    {{ __('Editar cliente') }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Editar cliente') }}</h1>
</div>
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ $cliente->nombre }}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('cliente.update', $cliente) }}" method="post">
            @include('cliente._formbody')
            @method('put')
            <div class="text-end">
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary shadow-sm">
                    <span>{{ __('Cancelar') }}</span>
                </a>
                <button type="submit" class="btn btn-success shadow-sm">
                    <span>{{ __('Actualizar') }}</span>
                </button>
            </div>
        </form>
        <br>
        @include('plantillas.validationerrors')
    </div>
</div>
@endsection