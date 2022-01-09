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
                                {{__('Dirección')}}
                            </th>
                            <th>
                                {{ __('Opciones') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $clientes as $cliente )
                            <tr>
                                <td>
                                    {{ $cliente->nombre }}
                                </td>
                                <td>
                                    <small>{{ $cliente->direccion }}</small>
                                </td>
                                <td>
                                    <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-outline-primary shadow-sm">
                                        <span>{{ __('Editar') }}</span>
                                    </a>
                                    <a href="{{ route('cliente.show', $cliente) }}" class="btn btn-outline-info shadow-sm">
                                        <span>{{ __('Ver') }}</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    @if ( $clientes->count() == 0 )
                        {{ __('Sin registros') }}
                    @endif
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
