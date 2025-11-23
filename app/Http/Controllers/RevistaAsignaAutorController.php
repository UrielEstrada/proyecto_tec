<?php

namespace App\Http\Controllers;

use App\Models\RevistaAsignaAutor;
use App\Models\RevistaArticulo;
use App\Models\RevistaAutor;
use Illuminate\Http\Request;

class RevistaAsignaAutorController extends Controller
{
    public function index()
    {
        $asignaciones = RevistaAsignaAutor::with(['autor.persona', 'articulo'])->get();
        return view('revistas.asignaautor.index', compact('asignaciones'));
    }

    public function create()
    {
        $articulos = RevistaArticulo::all();
        $autores = RevistaAutor::with('persona')->get();

        return view('revistas.asignaautor.create', compact('articulos', 'autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_art' => 'required|exists:revista_articulos,id_articulos',
            'id_autor' => 'required|exists:revista_autores,id_autor',
        ]);

        RevistaAsignaAutor::create($request->all());

        return redirect()->route('revista.asignaautor.index')
            ->with('success', 'Autor asignado al artículo correctamente.');
    }

    public function destroy($id_art, $id_autor)
    {
        RevistaAsignaAutor::where('id_art', $id_art)
            ->where('id_autor', $id_autor)
            ->delete();

        return redirect()->route('revista.asignaautor.index')
            ->with('success', 'Autor desasignado del artículo.');
    }
}
