<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RevistaTematica;
use App\Models\RevistaComite;
use App\Models\RevistaNumero;
use App\Models\RevistaConvocatoria;
use App\Models\RevistaArticulo;

class RevistaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PORTADA DE LA REVISTA (INICIO)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $tematicas = RevistaTematica::all();
        $comite = RevistaComite::with('persona')->get();

        return view('revistas.index', compact('tematicas', 'comite'));
    }

    /*
    |--------------------------------------------------------------------------
    | LISTA DE NÚMEROS PUBLICADOS
    |--------------------------------------------------------------------------
    */
    public function numeros()
    {
        $numeros = RevistaNumero::with('tematica')->orderBy('fecha_inicio', 'desc')->get();

        return view('revistas.numeros.index', compact('numeros'));
    }

    /*
    |--------------------------------------------------------------------------
    | DETALLE DE UN NÚMERO (VOL / NÚM / AÑO)
    |--------------------------------------------------------------------------
    */
    public function verNumero($id)
    {
        $numero = RevistaNumeros::with(['tematica', 'articulos.autores.persona'])
                    ->where('id_numero', $id)
                    ->firstOrFail();

        return view('revistas.numeros.show', compact('numero'));
    }


    /*
    |--------------------------------------------------------------------------
    | CONVOCATORIA (INSTRUCCIONES PARA PUBLICAR)
    |--------------------------------------------------------------------------
    */
    public function convocatoria()
    {
        // Carga la convocatoria más reciente
        $convocatoria = RevistaConvocatoria::with('numero')->latest()->first();

        return view('revistas.convocatoria.index', compact('convocatoria'));
    }

    /*
    |--------------------------------------------------------------------------
    | CONSEJO EDITORIAL
    |--------------------------------------------------------------------------
    */
    public function comite()
    {
        $comite = RevistaComite::with('persona')->get();

        return view('revistas.comite.index', compact('comite'));
    }

    /*
    |--------------------------------------------------------------------------
    | DETALLE DE ARTÍCULO (PDF + autores)
    |--------------------------------------------------------------------------
    */
    public function verArticulo($id)
    {
        $articulo = RevistaArticulo::with(['autores.persona', 'numero'])
                    ->findOrFail($id);

        return view('revistas.articulos.show', compact('articulo'));
    }
}
