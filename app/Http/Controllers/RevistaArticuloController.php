<?php

namespace App\Http\Controllers;

use App\Models\RevistaArticulo;
use App\Models\RevistaNumero;
use App\Models\RevistaAutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RevistaArticuloController extends Controller
{
    public function index()
    {
        $articulos = RevistaArticulo::with(['numero', 'autores'])->get();
        return view('revistas.articulos.index', compact('articulos'));
    }

    public function create()
    {
        $numeros = RevistaNumero::all();
        $autores = RevistaAutor::with('persona')->get();
        return view('revistas.articulos.create', compact('numeros', 'autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_numero' => 'required|exists:revista_numeros,id_numero',
            'titulo' => 'required|string|max:255',
            'archivo_pdf' => 'required|mimes:pdf|max:20480', // 20 MB
            'fecha_publicidad' => 'nullable|date',
            'autores' => 'required|array',
        ]);

        // Guardar PDF
        $pdfPath = $request->file('archivo_pdf')->store('articulos', 'public');

        $articulo = RevistaArticulo::create([
            'id_numero' => $request->id_numero,
            'titulo' => $request->titulo,
            'archivo_pdf' => $pdfPath,
            'fecha_publicidad' => $request->fecha_publicidad,
        ]);

        // Relación autores
        $articulo->autores()->attach($request->autores);

        return redirect()->route('revista.articulos.index')
            ->with('success', 'Artículo registrado correctamente.');
    }

    public function edit($id)
    {
        $articulo = RevistaArticulo::findOrFail($id);
        $numeros = RevistaNumero::all();
        $autores = RevistaAutor::with('persona')->get();

        return view('revistas.articulos.edit', compact('articulo', 'numeros', 'autores'));
    }

    public function update(Request $request, $id)
    {
        $articulo = RevistaArticulo::findOrFail($id);

        $request->validate([
            'id_numero' => 'required|exists:revista_numeros,id_numero',
            'titulo' => 'required|string|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:20480',
            'fecha_publicidad' => 'nullable|date',
            'autores' => 'required|array',
        ]);

        $data = $request->only(['id_numero', 'titulo', 'fecha_publicidad']);

        // Si sube un PDF nuevo
        if ($request->hasFile('archivo_pdf')) {
            Storage::disk('public')->delete($articulo->archivo_pdf);
            $data['archivo_pdf'] = $request->file('archivo_pdf')->store('articulos', 'public');
        }

        $articulo->update($data);

        // Actualizar autores
        $articulo->autores()->sync($request->autores);

        return redirect()->route('revista.articulos.index')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $articulo = RevistaArticulo::findOrFail($id);

        // Eliminar PDF
        Storage::disk('public')->delete($articulo->archivo_pdf);

        $articulo->autores()->detach();
        $articulo->delete();

        return redirect()->route('revista.articulos.index')
            ->with('success', 'Artículo eliminado correctamente.');
    }
}
