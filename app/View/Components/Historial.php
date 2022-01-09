<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Historial extends Component
{
    private $datos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $entidad )
    {
        $historial = $entidad->historial;
        $this->datos = [
            'historial' => (is_null( $historial ) ? [] : $historial->sortByDesc('id')),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.historial', $this->datos);
    }
}
