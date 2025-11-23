<?php

namespace App\Http\Controllers;

use App\Models\RevistaNumero;
use App\Models\RevistaTematica;
use Illuminate\Http\Request;

class RevistaNumeroController extends Controller
{
    public function index()
    {
        $numeros = RevistaNumero::with('tematica')->get();
        return view('revistas.numeros.index', compact('numeros'));
    }

    public function create()
    {
        $tematicas = RevistaTematica::all();
        return view('revistas.numeros.create', compact('tematicas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'id_tematica' => 'required|exists:revista_tematica,id_tematica',
        ]);

        RevistaNumero::create($request->all());

        return redirect()->route('revista.numeros.index')
            ->with('success', 'Número de revista registrado correctamente.');
    }

    public function show($id)
    {
        $numero = RevistaNumero::with(['tematica', 'articulos'])->findOrFail($id);
        return view('revistas.numeros.show', compact('numero'));
    }

    public function edit($id)
    {
        $numero = RevistaNumero::findOrFail($id);
        $tematicas = RevistaTematica::all();
        return view('revistas.numeros.edit', compact('numero', 'tematicas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'id_tematica' => 'required|exists:revista_tematica,id_tematica',
        ]);

        $numero = RevistaNumero::findOrFail($id);
        $numero->update($request->all());

        return redirect()->route('revista.numeros.index')
            ->with('success', 'Número actualizado correctamente.');
    }

    public function destroy($id)
    {
        RevistaNumero::destroy($id);

        return redirect()->route('revista.numeros.index')
            ->with('success', 'Número eliminado correctamente.');
    }
}
