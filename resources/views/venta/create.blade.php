@extends('plantillas.app')

@section('title')
    {{ __('Nueva venta') }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Nueva venta') }}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('venta.store') }}" method="post">
            @include('venta._formbody')
            <div class="text-end">
                <a href="{{ route('venta.index') }}" class="btn btn-secondary shadow-sm">
                    <span>{{ __('Cancelar') }}</span>
                </a>
                <button type="submit" class="btn btn-success shadow-sm">
                    <span>{{ __('Guardar') }}</span>
                </button>
            </div>
        </form>
        <br>
        @include('plantillas.validationerrors')
    </div>
</div>
@endsection