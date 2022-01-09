<?php

namespace App\Models;

use App\Models\Util\CambiosRegistro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CambiosRegistro;

    protected $guarded = ['id'];
    protected $dates = ['fecha_venta', 'created_at', 'updated_at'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_productos')->withPivot('cantidad');
    }

    public function total()
    {
        return $this->productos->sum(function( $producto ){ return $producto->total(); });
    }

    public function fechaVenta()
    {
        $fecha = $this->fecha_venta;
        return is_null( $fecha ) ? __('Sin fecha') : $fecha->format('d / m / Y'); 
    }

    public function estado()
    {
        $resp = "Desconocido";
        switch( $this->estado )
        {
            case 0:
                $resp = "Cotización";
                break;
            case 1:
                $resp = "Realizada";
                break;
            case 2:
                $resp = "Cancelada";
                break;
        }
        return __($resp);
    }

    public function realizada()
    {
        return $this->estado == 1;
    }

    public function cancelada()
    {
        return $this->estado == 2;
    }

    public function cotizada()
    {
        return $this->estado == 0;
    }

    public function historial()
    {
        return $this->morphMany(Historia::class, 'historiable');
    }

}
