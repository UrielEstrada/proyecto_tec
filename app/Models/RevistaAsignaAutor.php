<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaAsignaAutor extends Model
{
    protected $table = 'revista_asignaautor';
    public $timestamps = false;
    protected $primaryKey = null; // porque es compuesta
    public $incrementing = false;

    protected $fillable = [
        'id_art',
        'id_autor',
    ];

    // Autor relacionado
    public function autor()
    {
        return $this->belongsTo(RevistaAutor::class, 'id_autor', 'id_autor');
    }

    // Artículo relacionado
    public function articulo()
    {
        return $this->belongsTo(RevistaArticulo::class, 'id_art', 'id_articulos');
    }
}
