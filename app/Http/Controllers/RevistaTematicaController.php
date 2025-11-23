<?php

namespace App\Http\Controllers;

use App\Models\RevistaTematica;
use Illuminate\Http\Request;

class RevistaTematicaController extends Controller
{
    public function index()
    {
        $tematicas = RevistaTematica::all();
        return view('revistas.tematica.index', compact('tematicas'));
    }

    public function create()
    {
        return view('revistas.tematica.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        RevistaTematica::create($request->all());

        return redirect()->route('revista.tematica.index')
            ->with('success', 'Temática registrada correctamente.');
    }

    public function edit($id)
    {
        $tematica = RevistaTematica::findOrFail($id);
        return view('revistas.tematica.edit', compact('tematica'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $tematica = RevistaTematica::findOrFail($id);
        $tematica->update($request->all());

        return redirect()->route('revista.tematica.index')
            ->with('success', 'Temática actualizada correctamente.');
    }

    public function destroy($id)
    {
        RevistaTematica::destroy($id);

        return redirect()->route('revista.tematica.index')
            ->with('success', 'Temática eliminada correctamente.');
    }
}
