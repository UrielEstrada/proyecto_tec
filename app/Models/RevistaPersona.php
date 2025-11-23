<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevistaPersona extends Model
{
    protected $table = 'revista_personas_generales';
    protected $primaryKey = 'id_personas';

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'correo',
        'telefono',
    ];

    public $timestamps = true;
}
