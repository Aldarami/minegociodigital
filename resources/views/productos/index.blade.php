@extends('plantillas.app')

@section('title')
{{ __('Productos') }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
</div>
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Productos') }}
        </h6>
    </div>
    <div class="card-body">
        <div class="text-end">
            <a href="{{ route('producto.create') }}" class="btn btn-outline-info shadow-sm">
                <span>{{ __('Nuevo') }}</span>
            </a>
        </div>
        <div class="mt-3">
            <livewire:producto-index/>
        </div>
    </div>
</div>
@endsection