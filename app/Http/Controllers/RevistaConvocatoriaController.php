<?php

namespace App\Http\Controllers;

use App\Models\RevistaConvocatoria;
use App\Models\RevistaNumero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RevistaConvocatoriaController extends Controller
{
    public function index()
    {
        $convocatorias = RevistaConvocatoria::with('numero')->get();
        return view('revistas.convocatorias.index', compact('convocatorias'));
    }

    public function create()
    {
        $numeros = RevistaNumero::all();
        return view('revistas.convocatorias.create', compact('numeros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_numero' => 'required|exists:revista_numeros,id_numero',
            'archivoconvoca' => 'nullable|mimes:pdf|max:20480',
            'archivoguia' => 'nullable|mimes:pdf|max:20480',
            'archivoejemplo' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->all();

        // Guardar archivos PDF
        if ($request->hasFile('archivoconvoca')) {
            $data['archivoconvoca'] = $request->file('archivoconvoca')
                ->store('convocatorias', 'public');
        }

        if ($request->hasFile('archivoguia')) {
            $data['archivoguia'] = $request->file('archivoguia')
                ->store('convocatorias', 'public');
        }

        if ($request->hasFile('archivoejemplo')) {
            $data['archivoejemplo'] = $request->file('archivoejemplo')
                ->store('convocatorias', 'public');
        }

        RevistaConvocatoria::create($data);

        return redirect()->route('revista.convocatorias.index')
            ->with('success', 'Convocatoria registrada correctamente.');
    }

    public function edit($id)
    {
        $convocatoria = RevistaConvocatoria::findOrFail($id);
        $numeros = RevistaNumero::all();
        return view('revistas.convocatorias.edit', compact('convocatoria', 'numeros'));
    }

    public function update(Request $request, $id)
    {
        $convocatoria = RevistaConvocatoria::findOrFail($id);

        $request->validate([
            'fecha' => 'required|date',
            'id_numero' => 'required|exists:revista_numeros,id_numero',
            'archivoconvoca' => 'nullable|mimes:pdf|max:20480',
            'archivoguia' => 'nullable|mimes:pdf|max:20480',
            'archivoejemplo' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->all();

        // Reemplazar archivos PDF si vienen nuevos
        if ($request->hasFile('archivoconvoca')) {
            Storage::disk('public')->delete($convocatoria->archivoconvoca);
            $data['archivoconvoca'] = $request->file('archivoconvoca')->store('convocatorias', 'public');
        }

        if ($request->hasFile('archivoguia')) {
            Storage::disk('public')->delete($convocatoria->archivoguia);
            $data['archivoguia'] = $request->file('archivoguia')->store('convocatorias', 'public');
        }

        if ($request->hasFile('archivoejemplo')) {
            Storage::disk('public')->delete($convocatoria->archivoejemplo);
            $data['archivoejemplo'] = $request->file('archivoejemplo')->store('convocatorias', 'public');
        }

        $convocatoria->update($data);

        return redirect()->route('revista.convocatorias.index')
            ->with('success', 'Convocatoria actualizada correctamente.');
    }

    public function destroy($id)
    {
        $convocatoria = RevistaConvocatoria::findOrFail($id);

        Storage::disk('public')->delete([
            $convocatoria->archivoconvoca,
            $convocatoria->archivoguia,
            $convocatoria->archivoejemplo,
        ]);

        $convocatoria->delete();

        return redirect()->route('revista.convocatorias.index')
            ->with('success', 'Convocatoria eliminada correctamente.');
    }
}
