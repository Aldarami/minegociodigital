<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteIndex extends Component
{
    use WithPagination;
    public $noRegistros = 10;
    public $busqueda;
    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $query = Cliente::orderByDesc('id');
        if( $this->busqueda )
        {
            $query->where('nombre', 'like', '%'.$this->busqueda.'%');
            $this->resetPage();
        }
        $datos = [
            'clientes' => $query->paginate( $this->noRegistros ),
        ];
        return view('livewire.cliente-index', $datos);
    }
}
