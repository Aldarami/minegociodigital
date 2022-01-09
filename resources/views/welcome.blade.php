@extends('plantillas.app')

@section('title')
    Mi negocio digital
@endsection

@section('contenido')
<div class="container bg-white p-4 rounded shadow-sm">
    <div class="row">
        <div class="col-sm-12 border-bottom">
            <h1>
                Mi negocio digital
            </h1>
        </div>
        <div class="col-sm-12">
            <div class="row ">
                <div class="col-sm-6 p-5">
                    <h3 class="mb-3">
                        {{ __('Registrate') }}
                    </h3>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="InputNameRe" class="form-label">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" name="name" id="InputNameRe" placeholder="Ingrese su nombre">
                        </div>
                        <div class="mb-3">
                            <label for="InputCorreoRe" class="form-label">{{ __('Correo') }}</label>
                            <input type="email" name="email" id="InputCorreoRe" class="form-control" placeholder="ejemplo@correo.com">
                        </div>
                        <div class="mb-3">
                            <label for="InputContrasenaRe" class="form-label">{{ __('Contraseña') }}</label>
                            <input type="password" name="password" id="InputContrasenaRe" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="mb-3">
                            <label for="InputConfirmacionContrasenaRe" class="form-label">{{ __('Repita la contraseña') }}</label>
                            <input type="password" name="password_confirmation" id="InputConfirmacionContrasenaRe" class="form-control" placeholder="Ingrese la misma contraseña">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary shadow-sm">
                                <span>
                                    {{__('Registrarme')}}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6 p-5">
                    <h3>
                        {{ __('Inicia sesión') }}
                    </h3>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="InputCorreo" class="form-label">{{ __('Correo') }}</label>
                            <input type="email" name="email" id="InputCorreo" class="form-control" placeholder="ejemplo@correo.com">
                        </div>
                        <div class="mb-3">
                            <label for="InputContrasena" class="form-label">{{ __('Contraseña') }}</label>
                            <input type="password" name="password" id="InputContrasena" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-info shadow-sm">
                                <span>
                                    {{__('Ingresar')}}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            @include('plantillas.validationerrors')
        </div>
    </div>
</div>
@endsection