<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaArticulo extends Model
{
    protected $table = 'revista_articulos';
    protected $primaryKey = 'id_articulos';

    protected $fillable = [
        'id_numero',
        'titulo',
        'archivo_pdf',
        'fecha_publicidad'
    ];

    public $timestamps = true;

    // Un artículo pertenece a un número
    public function numero()
    {
        return $this->belongsTo(RevistaNumero::class, 'id_numero', 'id_numero');
    }

    // Un artículo tiene varios autores (relación many-to-many)
    public function autores()
    {
        return $this->belongsToMany(
            RevistaAutor::class,
            'revista_asignaautor',
            'id_art',
            'id_autor'
        );
    }
}
