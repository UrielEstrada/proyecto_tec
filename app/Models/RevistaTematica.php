<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaTematica extends Model
{
    protected $table = 'revista_tematica';
    protected $primaryKey = 'id_tematica';

    protected $fillable = [
        'descripcion',
    ];

    public $timestamps = true;

    // Un área temática puede pertenecer a varios números
    public function numeros()
    {
        return $this->hasMany(RevistaNumero::class, 'id_tematica', 'id_tematica');
    }

    // Un área temática puede ser asignada a varias convocatorias por 'asigna_cobertura'
    public function asignaciones()
    {
        return $this->hasMany(RevistaAsignacionCobertura::class, 'id_tematica', 'id_tematica');
    }
}
