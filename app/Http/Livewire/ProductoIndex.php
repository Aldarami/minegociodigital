<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoIndex extends Component
{
    use WithPagination;
    public $noRegistros = 10;
    public $busqueda;
    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $query = Producto::orderByDesc('id');
        if( $this->busqueda )
        {
            $query->where('nombre', 'like', '%'.$this->busqueda.'%');
            $this->resetPage();
        }
        $datos = [
            'productos' => $query->paginate( $this->noRegistros ),
        ];
        return view('livewire.producto-index', $datos);
    }
}
