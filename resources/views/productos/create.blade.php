@extends('plantillas.app')

@section('title')
    {{ __('Nuevo producto') }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection


@section('contenido')
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Nuevo producto') }}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('producto.store') }}" method="post">
            @include('productos._formbody')
            <div class="text-end">
                <a href="{{ route('producto.index') }}" class="btn btn-secondary shadow-sm">
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