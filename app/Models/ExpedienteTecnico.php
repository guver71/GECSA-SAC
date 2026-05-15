<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteTecnico extends Model
{
    protected $table = 'expedientes_tecnicos';

    protected $fillable = ['title', 'snip', 'monto', 'fecha_contrato', 'orden', 'activo'];

    protected $casts = ['activo' => 'boolean'];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
