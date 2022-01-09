@csrf
<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="InputNombreCliente" class="form-label">* {{ __('Nombre') }}</label>
        <input type="text" name="nombre" id="InputNombreCliente" class="form-control" placeholder="Ingrese el nombre" value="{{ old('nombre', $cliente->nombre  ?? '') }}">
    </div>
    <div class="col-sm-12 mb-3">
        <label for="InputDireccionCliente" class="form-label"> {{ __('Dirección') }}</label>
        <textarea type="text" name="direccion" id="InputDireccionCliente" class="form-control" placeholder="Ingrese la dirección">{{ old('direccion', $cliente->direccion  ?? '') }}</textarea>
    </div>
</div>