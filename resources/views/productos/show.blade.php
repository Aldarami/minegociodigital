@extends('plantillas.app')

@section('title')
    {{ $producto->nombre }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $producto->nombre }}</h1>
</div>
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Producto') }}
        </h6>
    </div>
    <div class="card-body">
        <div>
            <small>{{ $producto->tipo() }}</small>
            <div class="text-end">
                <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary shadow-sm">
                    <span>{{ __('Volver') }}</span>
                </a>
                <a href="{{ route('producto.edit', $producto) }}" class="btn btn-outline-primary shadow-sm">
                    <span>{{ __('Editar') }}</span>
                </a>
            </div>
            <div>
                <small class="text-muted">
                    {{ __('Descripción') }}
                </small>
                <p>
                    {{ $producto->descripcion }}
                </p>
                <div class="row">
                    <div class="col-sm-2">
                        <small>
                            {{ __('Costo') }}
                        </small>
                        $&nbsp;{{ number_format( $producto->costo, 2 ) }}
                    </div>
                    <div class="col-sm-2">
                        <small>
                            {{ __('Precio') }}
                        </small>
                        $&nbsp;{{ number_format( $producto->precio, 2 ) }}
                    </div>
                    <div class="col-sm-2">
                        <small>
                            {{ __('Almacenable') }}:
                        </small>
                        {{ $producto->almacenable() }}
                    </div>
                    <div class="col-sm-2">
                        <small>
                            {{ __('Comprable') }}:
                        </small>
                        {{ $producto->comprable() }}
                    </div>
                    <div class="col-sm-2">
                        <small>
                            {{ __('Vendible') }}:
                        </small>
                        {{ $producto->vendible() }}
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-sm-12">
                <x-historial :entidad="$producto"></x-historial>
            </div>
        </div>
    </div>
</div>
@endsection