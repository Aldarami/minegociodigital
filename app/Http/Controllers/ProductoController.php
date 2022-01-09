<?php

namespace App\Http\Controllers;

use App\Events\HistoriaEvent;
use App\Http\Requests\ProductoRequest;
use App\Models\Historia;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $datos = $request->validated();
        DB::beginTransaction();
        try
        {
            // Guardar producto
            $producto = Producto::create( $datos );
            // Guardar historial
            HistoriaEvent::dispatch( 'Registro', 
                Historia::TIPO_REGISTRO, 
                Producto::class, 
                $producto->id, 
                'Se registró el producto con el nombre de: '.$producto->nombre.' por el usuario '.auth()->user()->name );
            DB::commit();
            return redirect()->route('producto.index');
        }
        catch( \Throwable $th )
        {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->withErrors([__('Ha ocurrido un error al registrar el producto')])->withInput($datos);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        $datos = [
            'producto'  => $producto
        ];
        return view('productos.show', $datos );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update( ProductoRequest $request, Producto $producto)
    {
        $datos = $request->validated();
        DB::beginTransaction();
        try
        {
            $cambios = $producto->cambiosRegistro( $datos );
            // Guardar producto
            $producto->update($datos);
            // Guardar historial
            HistoriaEvent::dispatch( 'Registro', 
                Historia::TIPO_ACTUALIZACION, 
                Producto::class, 
                $producto->id, 
                'Se actualizó el producto por el usuario '.auth()->user()->name.'. '.$cambios );
            DB::commit();
            return redirect()->route('producto.show', $producto);
        }
        catch( \Throwable $th )
        {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->withErrors([__('Ha ocurrido un error al actualizar el producto')])->withInput($datos);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
