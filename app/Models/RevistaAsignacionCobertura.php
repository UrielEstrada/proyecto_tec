<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaAsignacionCobertura extends Model
{
    protected $table = 'revista_asigna_cobertura';
    protected $primaryKey = 'id_asignacob';

    protected $fillable = [
        'id_numero',
        'id_tematica',
    ];

    public $timestamps = true;

    // Un registro pertenece a un número
    public function numero()
    {
        return $this->belongsTo(RevistaNumero::class, 'id_numero', 'id_numero');
    }

    // Un registro pertenece a una temática
    public function tematica()
    {
        return $this->belongsTo(RevistaTematica::class, 'id_tematica', 'id_tematica');
    }
}
