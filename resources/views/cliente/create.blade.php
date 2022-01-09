@extends('plantillas.app')

@section('title')
    {{ __('Nuevo cliente') }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Nuevo cliente') }}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('cliente.store') }}" method="post">
            @include('cliente._formbody')
            <div class="text-end">
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary shadow-sm">
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