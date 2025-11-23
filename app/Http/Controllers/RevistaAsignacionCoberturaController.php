<?php

namespace App\Http\Controllers;

use App\Models\RevistaAsignacionCobertura;
use App\Models\RevistaNumero;
use App\Models\RevistaTematica;
use Illuminate\Http\Request;

class RevistaAsignacionCoberturaController extends Controller
{
    public function index()
    {
        $asignaciones = RevistaAsignacionCobertura::with(['numero', 'tematica'])->get();
        return view('revistas.cobertura.index', compact('asignaciones'));
    }

    public function create()
    {
        $numeros = RevistaNumero::all();
        $tematicas = RevistaTematica::all();
        return view('revistas.cobertura.create', compact('numeros', 'tematicas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_numero'   => 'required|exists:revista_numeros,id_numero',
            'id_tematica' => 'required|exists:revista_tematica,id_tematica',
        ]);

        RevistaAsignacionCobertura::create($request->all());

        return redirect()->route('revista.cobertura.index')
            ->with('success', 'Cobertura asignada correctamente.');
    }

    public function edit($id)
    {
        $asignacion = RevistaAsignacionCobertura::findOrFail($id);
        $numeros = RevistaNumero::all();
        $tematicas = RevistaTematica::all();

        return view('revistas.cobertura.edit', compact('asignacion', 'numeros', 'tematicas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_numero'   => 'required|exists:revista_numeros,id_numero',
            'id_tematica' => 'required|exists:revista_tematica,id_tematica',
        ]);

        $asignacion = RevistaAsignacionCobertura::findOrFail($id);
        $asignacion->update($request->all());

        return redirect()->route('revista.cobertura.index')
            ->with('success', 'Cobertura actualizada correctamente.');
    }

    public function destroy($id)
    {
        RevistaAsignacionCobertura::destroy($id);

        return redirect()->route('revista.cobertura.index')
            ->with('success', 'Cobertura eliminada correctamente.');
    }
}
