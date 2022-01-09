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
                                {{__('Descripción')}}
                            </th>
                            <th>
                                {{ __('Precio') }}
                            </th>
                            <th>
                                {{ __('Costo') }}
                            </th>
                            <th>
                                {{ __('Opciones') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $productos as $producto )
                            <tr>
                                <td>
                                    {{ $producto->nombre }}
                                </td>
                                <td>
                                    <small>{{ $producto->descripcion }}</small>
                                </td>
                                <td>
                                    $&nbsp;{{ number_format( $producto->costo, 2 ) }}
                                </td>
                                <td>
                                    $&nbsp;{{ number_format( $producto->precio, 2 ) }}
                                </td>
                                <td>
                                    <a href="{{ route('producto.edit', $producto) }}" class="btn btn-outline-primary shadow-sm">
                                        <span>{{ __('Editar') }}</span>
                                    </a>
                                    <a href="{{ route('producto.show', $producto) }}" class="btn btn-outline-info shadow-sm">
                                        <span>{{ __('Ver') }}</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
