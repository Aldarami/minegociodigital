<?php

namespace App\Models;

use App\Models\Util\CambiosRegistro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CambiosRegistro;

    protected $guarded = ['id'];

    /**
     * Devuelve el nombre del tipo del producto
     * @return string
     */
    public function tipo()
    {
        $resp = "Desconocido";
        switch ( $this->tipo )
        {
            case 0:
                $resp = "Producto";
                break;
            case 1:
                $resp = "Servicio";
                break;
        }
        return __($resp);
    }

    public function historial()
    {
        return $this->morphMany( Historia::class, 'historiable' );
    }

    public function almacenable()
    {
        return __( $this->almacenable ? "Sí" : "No" );
    }

    public function comprable()
    {
        return __( $this->comprable ? "Sí" : "No" );
    }

    public function vendible()
    {
        return __( $this->vendible ? "Sí" : "No" );
    }

    /**
     * Esta función solo puede ser llamada si viene de la relación con venta
     */
    public function total()
    {
        return $this->pivot->cantidad * $this->precio;
    }

    public function scopeVendible( $query )
    {
        return $query->where('vendible', 1);
    }

    public function scopeAlmacenable( $query )
    {
        return $query->where('almacenable', 1);
    }

    public function scopeComprable( $query )
    {
        return $query->where('comprable', 1);
    }
}
