<?php

namespace App\Http\Controllers;

use App\Models\RevistaComite;
use App\Models\RevistaPersona;
use Illuminate\Http\Request;

class RevistaComiteController extends Controller
{
    public function index()
    {
        $comite = RevistaComite::with('persona')->get();
        return view('revistas.comite.index', compact('comite'));
    }

    public function create()
    {
        $personas = RevistaPersona::all();
        return view('revistas.comite.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_personas' => 'required|exists:revista_personas_generales,id_personas',
            'cargo' => 'required|string|max:255',
        ]);

        RevistaComite::create($request->all());

        return redirect()->route('revista.comite.index')
            ->with('success', 'Miembro del comité agregado correctamente.');
    }

    public function edit($id)
    {
        $comite = RevistaComite::findOrFail($id);
        $personas = RevistaPersona::all();
        return view('revistas.comite.edit', compact('comite', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_personas' => 'required|exists:revista_personas_generales,id_personas',
            'cargo' => 'required|string|max:255',
        ]);

        $comite = RevistaComite::findOrFail($id);
        $comite->update($request->all());

        return redirect()->route('revista.comite.index')
            ->with('success', 'Miembro del comité actualizado correctamente.');
    }

    public function destroy($id)
    {
        RevistaComite::destroy($id);

        return redirect()->route('revista.comite.index')
            ->with('success', 'Miembro del comité eliminado correctamente.');
    }
}
