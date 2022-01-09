<?php

namespace App\Http\Livewire;

use App\Models\Venta;
use Livewire\Component;
use Livewire\WithPagination;

class VentaIndex extends Component
{
    use WithPagination;
    public $noRegistros = 10;
    public $busqueda;
    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $query = Venta::orderByDesc('id');
        if( $this->busqueda )
        {
            $query->where('concepto', 'like', '%'.$this->busqueda.'%');
            $this->resetPage();
        }
        $datos = [
            'ventas' => $query->paginate( $this->noRegistros ),
        ];
        return view('livewire.venta-index', $datos);
    }
}
