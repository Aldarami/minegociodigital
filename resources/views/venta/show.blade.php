@extends('plantillas.app')

@section('title')
{{ $venta->nombre }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $venta->concepto }}</h1>
</div>
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Venta') }}
        </h6>
    </div>
    <div class="card-body">
        <div class="text-end">
            <a href="{{ route('venta.index') }}" class="btn btn-outline-secondary shadow-sm">
                <span>{{ __('Volver') }}</span>
            </a>
            <a href="{{ route('venta.edit', $venta) }}" class="btn btn-outline-primary shadow-sm">
                <span>{{ __('Editar') }}</span>
            </a>
        </div>
        <div>
            <div class="row">
                <div class="col-sm-4">
                    <small class="text-muted">
                        {{ __('Cliente') }}
                    </small>
                    <p>
                        {{ $cliente->nombre }}
                    </p>
                </div>
                <div class="col-sm-4">
                    <small class="text-muted">
                        {{ __('Estado') }}
                    </small>
                    <p>
                        {{ $venta->estado() }}
                    </p>
                </div>
                <div class="col-sm-4">
                    <small class="text-muted">
                        {{ __('Fecha') }}
                    </small>
                    <p>
                        {{ $venta->fechaVenta() }}
                    </p>
                </div>
                <div class="col-sm-12">
                    <livewire:venta-producto-gestion :venta="$venta"/>
                </div>
                <div class="col-sm-12">
                    @include('plantillas.validationerrors')
                </div>
                <div class="col-sm-12">
                    {{-- Actualizaciones de estado --}}
                    @if ( $venta->cotizada() )
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="{{ route('venta.update', $venta) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="concepto" value="{{ $venta->concepto }}">
                                    <input type="hidden" name="cliente_id" value="{{ $venta->cliente_id }}">
                                    <input type="hidden" name="estado" value="2">
                                    <button class="btn btn-outline-danger shadow-sm">
                                        {{ __('Cancelar') }}
                                    </button>
                                </form>
                            </div>
                            <div class="col-sm-6 text-end">
                                <form action="{{ route('venta.update', $venta) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="concepto" value="{{ $venta->concepto }}">
                                    <input type="hidden" name="cliente_id" value="{{ $venta->cliente_id }}">
                                    <input type="hidden" name="estado" value="1">
                                    <input type="date" name="fecha_venta" class="form-control mb-3" required>
                                    <button class="btn btn-outline-success shadow-sm">
                                        {{ __('Finalizar venta') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="col-sm-12">
            <x-historial :entidad="$venta"></x-historial>
        </div>
    </div>
</div>
@endsection