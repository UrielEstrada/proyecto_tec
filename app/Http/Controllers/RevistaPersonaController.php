<?php

namespace App\Http\Controllers;

use App\Models\RevistaPersona;
use Illuminate\Http\Request;

class RevistaPersonaController extends Controller
{
    public function index()
    {
        $personas = RevistaPersona::all();
        return view('revistas.personas.index', compact('personas'));
    }

    public function create()
    {
        return view('revistas.personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'correo' => 'required|email|unique:revista_personas_generales,correo',
        ]);

        RevistaPersona::create($request->all());

        return redirect()->route('revista.personas.index')
            ->with('success', 'Persona registrada correctamente.');
    }

    public function show($id)
    {
        $persona = RevistaPersona::findOrFail($id);
        return view('revistas.personas.show', compact('persona'));
    }

    public function edit($id)
    {
        $persona = RevistaPersona::findOrFail($id);
        return view('revistas.personas.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        $persona = RevistaPersona::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'correo' => 'required|email|unique:revista_personas_generales,correo,' . $id . ',id_personas',
        ]);

        $persona->update($request->all());

        return redirect()->route('revista.personas.index')
            ->with('success', 'Persona actualizada correctamente.');
    }

    public function destroy($id)
    {
        RevistaPersona::destroy($id);

        return redirect()->route('revista.personas.index')
            ->with('success', 'Persona eliminada correctamente.');
    }
}
