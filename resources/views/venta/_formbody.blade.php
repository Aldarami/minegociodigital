@csrf
<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="InputConceptoventa" class="form-label">* {{ __('Concepto') }}</label>
        <input type="text" name="concepto" id="InputConceptoventa" class="form-control" placeholder="Ingrese el concepto" value="{{ old('concepto', $venta->concepto  ?? '') }}">
    </div>
    <div class="col-sm-12 mb-3">
        <label for="InputClienteventa" class="form-label">* {{ __('Cliente') }}</label>
        <select name="cliente_id" id="InputClienteventa" class="form-select">
            @foreach ( $clientes as $cliente )
                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>
        <script>
            document.getElementById('InputClienteventa').value = "{{ old('cliente_id', $venta->cliente_id  ?? '') }}";
        </script>
    </div>
</div>