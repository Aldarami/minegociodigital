@extends('plantillas.app')

@section('title')
{{ $cliente->nombre }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $cliente->nombre }}</h1>
</div>
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Cliente') }}
        </h6>
    </div>
    <div class="card-body">
        <div class="text-end">
            <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary shadow-sm">
                <span>{{ __('Volver') }}</span>
            </a>
            <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-outline-primary shadow-sm">
                <span>{{ __('Editar') }}</span>
            </a>
        </div>
        <div>
            <small class="text-muted">
                {{ __('Dirección') }}
            </small>
            <p>
                {{ $cliente->direccion }}
            </p>
        </div>
        <hr>
        <div class="col-sm-12">
            <x-historial :entidad="$cliente"></x-historial>
        </div>
    </div>
</div>
@endsection