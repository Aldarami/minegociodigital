<div>
    <div class="row">
        {{-- Filtros --}}
        <div class="col-sm-9">
            <input type="text" name="" id="" class="form-control" wire:model="busqueda" placeholder="Buscar...">
        </div>
        <div class="col-sm-3">
            <select name="" id="" class="form-select" wire:model="noRegistros">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
            </select>
        </div>
        {{-- Listado --}}
        <div class="col-sm-12 mt-3">
            <div class="table-responsive">
                <table class="table table-columned table-hover">
                    <thead>
                        <tr>
                            <th>
                                {{__('Nombre')}}
                            </th>
                            <th>
                                {{__('Cliente')}}
                            </th>
                            <th>
                                {{__('Estado')}}
                            </th>
                            <th>
                                {{__('Fecha realizada')}}
                            </th>
                            <th>
                                {{ __('Opciones') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $ventas as $venta )
                            <tr>
                                <td>
                                    {{ $venta->concepto }}
                                </td>
                                <td>
                                    {{ $venta->cliente->nombre }}
                                </td>
                                <td>
                                    {{ $venta->estado() }}
                                </td>
                                <td>
                                    {{ $venta->fechaVenta() }}
                                </td>
                                <td>
                                    <a href="{{ route('venta.edit', $venta) }}" class="btn btn-outline-primary shadow-sm">
                                        <span>{{ __('Editar') }}</span>
                                    </a>
                                    <a href="{{ route('venta.show', $venta) }}" class="btn btn-outline-info shadow-sm">
                                        <span>{{ __('Ver') }}</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    @if ( $ventas->count() == 0 )
                        {{ __('Sin registros') }}
                    @endif
                    {{ $ventas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
