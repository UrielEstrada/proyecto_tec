<?php

namespace App\Http\Controllers;

use App\Models\RevistaAutor;
use App\Models\RevistaPersona;
use Illuminate\Http\Request;

class RevistaAutorController extends Controller
{
    public function index()
    {
        $autores = RevistaAutor::with('persona')->get();
        return view('revistas.autores.index', compact('autores'));
    }

    public function create()
    {
        $personas = RevistaPersona::all();
        return view('revistas.autores.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'datos_personales' => 'required|exists:revista_personas_generales,id_personas',
        ]);

        RevistaAutor::create($request->all());

        return redirect()->route('revista.autores.index')
            ->with('success', 'Autor registrado correctamente.');
    }

    public function show($id)
    {
        $autor = RevistaAutor::with('persona')->findOrFail($id);
        return view('revistas.autores.show', compact('autor'));
    }

    public function edit($id)
    {
        $autor = RevistaAutor::findOrFail($id);
        $personas = RevistaPersona::all();
        return view('revistas.autores.edit', compact('autor', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'datos_personales' => 'required|exists:revista_personas_generales,id_personas',
        ]);

        $autor = RevistaAutor::findOrFail($id);
        $autor->update($request->all());

        return redirect()->route('revista.autores.index')
            ->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy($id)
    {
        RevistaAutor::destroy($id);

        return redirect()->route('revista.autores.index')
            ->with('success', 'Autor eliminado correctamente.');
    }
}
