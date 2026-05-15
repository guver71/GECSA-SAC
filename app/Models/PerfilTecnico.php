<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilTecnico extends Model
{
    protected $table = 'perfiles_tecnicos';

    protected $fillable = ['proyecto', 'ubicacion', 'icon', 'orden', 'activo'];

    protected $casts = ['activo' => 'boolean'];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
