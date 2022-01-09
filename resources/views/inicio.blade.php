@extends('plantillas.app')

@section('title')
{{ __('Inicio') }}
@endsection

@section('sidebar')
    @include('plantillas.sidebar')
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bienvenido</h1>
</div>
<div class="card shadow">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Informes') }}
        </h6>
    </div>
    <div class="card-body">
        ...
    </div>
</div>
@endsection