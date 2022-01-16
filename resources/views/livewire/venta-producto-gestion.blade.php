<div>
    <div class="row">
        @if ( $venta->cotizada() )
            <div class="col-sm-8 mb-3">
                <label for="SelectProducto" class="form-label">{{ __('Producto') }}</label>
                <select name="producto_id" id="SelectProducto" class="form-select" wire:model="productoId">
                    <option value="">{{ __('Seleccione') }}</option>
                    @foreach ( $productos as $producto )
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <label for="InputCantidadAg" class="form-label">{{ __('Cantidad') }}</label>
                <input type="number" name="cantidad" id="InputCantidadAg" step="0.01" placeholder="0.00" class="form-control" wire:model="cantidad">
            </div>
            <div class="col-sm-2 text-end">
                <label for="InputCantidadAg" class="form-label">{{ __('Producto elegido') }}</label>
                <button class="btn btn-success shadow-sm btn-block" wire:click="agregarProductoVenta" onclick="this.disabled = true;">
                    <span>{{ __('Agregar') }}</span>
                </button>
            </div>
        @endif
        @if ( $mensajeError != "" )
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    {{ $mensajeError }}
                </div>
            </div>
        @endif
        <div class="col-sm-12 table-responsive">
            <table class="table table-hover table->columned">
                <thead>
                    <tr>
                        <th>
                            {{ __('Nombre') }}
                        </th>
                        <th>
                            {{ __('Cantidad') }}
                        </th>
                        <th>
                            {{ __('Precio') }}
                        </th>
                        <th>
                            {{ __('Total') }}
                        </th>
                        @if ( $venta->cotizada() )
                            <th>
                                {{ __('Opciones') }}
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $productosVenta as $producto )
                    <tr>
                        <td>
                            {{ $producto->nombre }}
                        </td>
                        <td>
                            {{ $producto->pivot->cantidad }}
                        </td>
                        <td>
                            $&nbsp;{{ number_format( $producto->precio, 2 ) }}
                        </td>
                        <td>
                            $&nbsp;{{ number_format( $producto->total(), 2 ) }}
                        </td>
                        @if ( $venta->cotizada() )
                            <th>
                                <button class="btn btn-outline-warning" wire:click="removerProductoVenta({{ $producto->id }})">
                                    <span>{{ __('Remover') }}</span>
                                </button>
                            </th>
                        @endif
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-end" colspan="4">
                            {{ __('Total') }}: $&nbsp;{{ number_format( $venta->total(), 2 ) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
