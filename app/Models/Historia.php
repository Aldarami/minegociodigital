<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    public const TIPO_REGISTRO = 0;
    public const TIPO_ACTUALIZACION = 1;
    public const TIPO_ELIMINACION = 2;

    public function historiable()
    {
        return $this->morphTo();
    }

}
