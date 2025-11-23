<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaAutor extends Model
{
    protected $table = 'revista_autores';
    protected $primaryKey = 'id_autor';

    protected $fillable = [
        'datos_personales',
    ];

    public $timestamps = true;

    // Un autor pertenece a una persona
    public function persona()
    {
        return $this->belongsTo(RevistaPersona::class, 'datos_personales', 'id_personas');
    }

    // Un autor puede tener varios artículos
    public function articulos()
    {
        return $this->belongsToMany(
            RevistaArticulo::class,
            'revista_asignaautor',
            'id_autor',
            'id_art'
        );
    }
}
