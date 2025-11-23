<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaNumero extends Model
{
    protected $table = 'revista_numeros';
    protected $primaryKey = 'id_numero';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'id_tematica',
    ];

    public $timestamps = true;

    // Un número pertenece a una temática
    public function tematica()
    {
        return $this->belongsTo(RevistaTematica::class, 'id_tematica', 'id_tematica');
    }

    // Un número tiene muchos artículos
    public function articulos()
    {
        return $this->hasMany(RevistaArticulo::class, 'id_numero', 'id_numero');
    }

    // Un número puede tener varias asignaciones de cobertura
    public function asignacionesCobertura()
    {
        return $this->hasMany(RevistaAsignacionCobertura::class, 'id_numero', 'id_numero');
    }

    // Un número puede tener una convocatoria
    public function convocatoria()
    {
        return $this->hasOne(RevistaConvocatoria::class, 'id_numero', 'id_numero');
    }
}
