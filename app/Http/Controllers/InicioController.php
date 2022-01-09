<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Devuelve la vista inmediata después de iniciar sesión
     */
    public function inicio()
    {
        return view('inicio');
    }
}
