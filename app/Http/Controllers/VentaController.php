<?php

namespace App\Http\Controllers;

use App\Events\HistoriaEvent;
use App\Http\Requests\VentaRequest;
use App\Models\Cliente;
use App\Models\Historia;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::orderByDesc('id')->get();
        $datos = [
            'clientes' => $clientes
        ];
        return view('venta.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( VentaRequest $request)
    {
        $datos = $request->validated();
        DB::beginTransaction();
        try
        {
            // Guardar cliente
            $venta = Venta::create( $datos );
            // Guardar historial
            HistoriaEvent::dispatch( 'Actualización', 
                Historia::TIPO_REGISTRO, 
                Venta::class, 
                $venta->id, 
                'Se registró la venta con el concepto de: '.$venta->concepto.' por el usuario '.auth()->user()->name );
            DB::commit();
            return redirect()->route('venta.show', $venta);
        }
        catch( \Throwable $th )
        {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->withErrors([__('Ha ocurrido un error al registrar la venta')])->withInput($datos);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        $datos = [
            'venta' => $venta,
            'cliente'   => $venta->cliente
        ];
        return view('venta.show', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $clientes = Cliente::orderByDesc('id')->get();
        $datos = [
            'clientes'  => $clientes,
            'venta'     => $venta
        ];
        return view('venta.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(VentaRequest $request, Venta $venta)
    {
        $datos = $request->validated();
        DB::beginTransaction();
        try
        {
            $cambios = $venta->cambiosRegistro( $datos );
            // Guardar venta
            $venta->update($datos);
            if( $venta->realizada() && $venta->productos()->count() == 0 )
            {
                DB::rollBack();
                return redirect()->back()->withErrors([__('No se puede finalizar sin productos agregados')])->withInput($datos);
            }
            // Guardar historial
            HistoriaEvent::dispatch( 'Actualización', 
                Historia::TIPO_ACTUALIZACION, 
                Venta::class, 
                $venta->id, 
                'Se actualizó la venta por el usuario '.auth()->user()->name.'. '.$cambios );
            DB::commit();
            return redirect()->route('venta.show', $venta);
        }
        catch( \Throwable $th )
        {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->withErrors([__('Ha ocurrido un error al actualizar la venta')])->withInput($datos);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
