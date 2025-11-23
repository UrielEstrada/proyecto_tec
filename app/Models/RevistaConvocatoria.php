<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaConvocatoria extends Model
{
    protected $table = 'revista_convocatorias';
    protected $primaryKey = 'id_convoca';

    protected $fillable = [
        'fecha',
        'archivoconvoca',
        'archivoguia',
        'archivoejemplo',
        'id_numero',
    ];

    public $timestamps = true;

    // Relación: una convocatoria pertenece a un número
    public function numero()
    {
        return $this->belongsTo(RevistaNumero::class, 'id_numero', 'id_numero');
    }
}
