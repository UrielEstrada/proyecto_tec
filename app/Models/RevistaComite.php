<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaComite extends Model
{
    protected $table = 'revista_comite';
    protected $primaryKey = 'id_comite';

    protected $fillable = [
        'id_personas',
        'cargo',
    ];

    public $timestamps = true;

    // Relación: un miembro del comité pertenece a una persona
    public function persona()
    {
        return $this->belongsTo(RevistaPersona::class, 'id_personas', 'id_personas');
    }
}
