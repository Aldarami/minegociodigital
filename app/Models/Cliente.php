<?php

namespace App\Models;

use App\Models\Util\CambiosRegistro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CambiosRegistro;

    protected $guarded = ['id'];

    public function historial()
    {
        return $this->morphMany(Historia::class, 'historiable');
    }
}
