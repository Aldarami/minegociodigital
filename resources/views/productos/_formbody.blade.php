@csrf
<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="InputNombreProducto" class="form-label">* {{ __('Nombre') }}</label>
        <input type="text" name="nombre" id="InputNombreProducto" class="form-control" placeholder="Ingrese el nombre" value="{{ old('nombre', $producto->nombre  ?? '') }}">
    </div>
    <div class="col-sm-12 mb-3">
        <label for="InputDescripcionProducto" class="form-label">{{ __('Descripción') }}</label>
        <textarea name="descripcion" id="InputDescripcionProducto" cols="30" rows="10" class="form-control" placeholder="...">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="SelectTipoProducto" class="form-label">{{ __('Tipo') }}</label>
        <select name="tipo" id="SelectTipoProducto" class="form-select">
            <option value="0">{{ __('Producto') }}</option>
            <option value="1">{{ __('Servicio') }}</option>
        </select>
        <script>
            document.getElementById('SelectTipoProducto').value = "{{ old('tipo', $producto->tipo ?? '0') }}";
        </script>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="InputCostoProducto" class="form-label"> {{ __('Costo') }}</label>
        <input type="number" name="costo" id="InputCostoProducto" step="0.01" placeholder="$ 0.00" class="form-control" value="{{ old('costo', $producto->costo ?? '') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label for="InputPrecioProducto" class="form-label">* {{ __('Precio') }}</label>
        <input type="number" name="precio" id="InputPrecioProducto" step="0.01" placeholder="$ 0.00" class="form-control" value="{{ old('precio', $producto->precio ?? '') }}">
    </div>
    <div class="col-sm-4 mb-3">
        <label class="form-check-label" for="SwitchAlmacenableProducto">Almacenable</label>
        <select name="almacenable" id="SwitchAlmacenableProducto" class="form-select">
            <option value="0">{{ __('No') }}</option>
            <option value="1">{{ __('Sí') }}</option>
        </select>
        <script>
            document.getElementById('SwitchAlmacenableProducto').value = "{{ old('almacenable', $producto->almacenable ?? 0) }}";
        </script>
    </div>
    <div class="col-sm-4 mb-3">
        <label class="form-check-label" for="SwitchVendibleProducto">Vendible</label>
        <select name="vendible" id="SwitchVendibleProducto" class="form-select">
            <option value="0">{{ __('No') }}</option>
            <option value="1">{{ __('Sí') }}</option>
        </select>
        <script>
            document.getElementById('SwitchVendibleProducto').value = "{{ old('vendible', $producto->vendible ?? 0) }}";
        </script>
    </div>
    <div class="col-sm-4 mb-3">
        <label class="form-check-label" for="SwitchComprableProducto">Comprable</label>
        <select name="comprable" id="SwitchComprableProducto" class="form-select">
            <option value="0">{{ __('No') }}</option>
            <option value="1">{{ __('Sí') }}</option>
        </select>
        <script>
            document.getElementById('SwitchComprableProducto').value = "{{ old('comprable', $producto->comprable ?? 0) }}";
        </script>
    </div>
</div>