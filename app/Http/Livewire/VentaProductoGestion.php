<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class VentaProductoGestion extends Component
{
    public $venta;
    /** variables para agregar productos */
    public $productoId;
    public $cantidad;
    public $mensajeError = "";
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        /** @var Illuminate\Support\Collection $productos */
        $productos = Producto::orderBy('nombre')->vendible()->get();
        $productosVenta = $this->venta->productos;
        // Filtra ya vendidos
        $productos = $productos->reject(function( $producto ) use ( $productosVenta )
            { 
                return $productosVenta->where('id', $producto->id)->first() ; 
            });
        $datos = [
            'productos' => $productos,
            'productosVenta' => $productosVenta
        ];
        return view('livewire.venta-producto-gestion', $datos);
    }

    public function agregarProductoVenta()
    {
        if( is_numeric( $this->cantidad ) )
        {
            try
            {
                $this->venta->productos()->attach( $this->productoId, ['cantidad' => $this->cantidad ] );
                $this->mensajeError = "";
            }
            catch( \Throwable $th )
            {
                Log::error( $th->getMessage() );
                $this->mensajeError = __('No se pudo agregar el producto');
            }
        }
        else
        {
            $this->mensajeError = __('Tiene que ingresar la cantidad');
        }
        $this->emit('refresh');
    }

    public function removerProductoVenta( $productoId )
    {
        try
        {
            $this->venta->productos()->detach( $productoId );
            $this->mensajeError = "";
        }
        catch( \Throwable $th )
        {
            Log::error( $th->getMessage() );
            $this->mensajeError = __('No se pudo remover el producto');
        }
        $this->emit('refresh');
    }
}
