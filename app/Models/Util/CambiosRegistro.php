<?php

namespace App\Models\Util;

trait CambiosRegistro
{
    public function cambiosRegistro( array $datosNuevos )
    {
        $cambios = "";
        foreach( $datosNuevos as $llave => $valor )
        {
            $valorActual = $this[$llave]; 
            if( $valor != $valorActual )
            {
                $cambios .= $llave.": ".$valorActual." -> ".$valor.", ";
            }
        }
        return $cambios;
    }
}