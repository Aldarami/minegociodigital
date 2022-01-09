<?php

namespace App\Http\Controllers;

use App\Events\HistoriaEvent;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Historia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $datos = $request->validated();
        DB::beginTransaction();
        try
        {
            // Guardar cliente
            $cliente = Cliente::create( $datos );
            // Guardar historial
            HistoriaEvent::dispatch( 'Registro', 
                Historia::TIPO_REGISTRO, 
                Cliente::class, 
                $cliente->id, 
                'Se registró el cliente con el nombre de: '.$cliente->nombre.' por el usuario '.auth()->user()->name );
            DB::commit();
            return redirect()->route('cliente.index');
        }
        catch( \Throwable $th )
        {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->withErrors([__('Ha ocurrido un error al registrar el cliente')])->withInput($datos);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        // Opción omitida por poca información que mostrar
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $datos = $request->validated();
        DB::beginTransaction();
        try
        {
            $cambios = $cliente->cambiosRegistro( $datos );
            // Guardar cliente
            $cliente->update($datos);
            // Guardar historial
            HistoriaEvent::dispatch( 'Registro', 
                Historia::TIPO_ACTUALIZACION, 
                Cliente::class, 
                $cliente->id, 
                'Se actualizó el cliente por el usuario '.auth()->user()->name.'. '.$cambios );
            DB::commit();
            return redirect()->route('cliente.show', $cliente);
        }
        catch( \Throwable $th )
        {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->back()->withErrors([__('Ha ocurrido un error al actualizar el cliente')])->withInput($datos);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
