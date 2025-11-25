@extends('layouts.revista')

@section('content')

<div class="w-full flex justify-center">
    <div class="max-w-6xl w-full px-6">

        <div class="bg-white shadow-2xl rounded-2xl p-12 mb-16">

            <!-- TÍTULO -->
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-6">Convocatoria</h2>

            @if ($convocatoria)

                <p class="text-gray-700 text-center max-w-3xl mx-auto mb-8">
                    Consulta la convocatoria vigente para la publicación de artículos en la 
                    <strong>Revista Tecnológica del TESVB</strong>.  
                    Las fechas y documentos se actualizan automáticamente desde la base de datos.
                </p>

                <hr class="my-8">

                <!-- SECCIÓN: FECHAS IMPORTANTES -->
                <h3 class="text-2xl font-semibold text-blue-800 mb-3">Fechas Importantes</h3>

                <ul class="list-disc text-gray-700 ml-6 space-y-2 mb-8">
                    <li><strong>Apertura de convocatoria:</strong> {{ $convocatoria->fecha_inicio }}</li>
                    <li><strong>Cierre de recepción de artículos:</strong> {{ $convocatoria->fecha_cierre }}</li>
                    <li><strong>Publicación del volumen:</strong> {{ $convocatoria->fecha_publicacion }}</li>
                </ul>

                <!-- SECCIÓN: DOCUMENTOS DESCARGABLES -->
                <h3 class="text-2xl font-semibold text-blue-800 mb-3">Descargas</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

                    @if ($convocatoria->archivo_convocatoria)
                    <a href="{{ asset('storage/' . $convocatoria->archivo_convocatoria) }}" 
                       target="_blank"
                       class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="text-lg font-bold text-blue-700">📄 Convocatoria Oficial</h4>
                        <p class="text-gray-600 text-sm">Descargar PDF</p>
                    </a>
                    @endif

                    @if ($convocatoria->archivo_plantilla)
                    <a href="{{ asset('storage/' . $convocatoria->archivo_plantilla) }}" 
                       target="_blank"
                       class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="text-lg font-bold text-blue-700">📝 Plantilla para Artículos</h4>
                        <p class="text-gray-600 text-sm">Archivo Word</p>
                    </a>
                    @endif

                    @if ($convocatoria->archivo_criterios)
                    <a href="{{ asset('storage/' . $convocatoria->archivo_criterios) }}"
                       target="_blank"
                       class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="text-lg font-bold text-blue-700">✔️ Criterios de Evaluación</h4>
                        <p class="text-gray-600 text-sm">Normativa completa</p>
                    </a>
                    @endif

                    @if ($convocatoria->archivo_guia)
                    <a href="{{ asset('storage/' . $convocatoria->archivo_guia) }}"
                       target="_blank"
                       class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                        <h4 class="text-lg font-bold text-blue-700">📘 Guía de Envío</h4>
                        <p class="text-gray-600 text-sm">Procedimiento para autores</p>
                    </a>
                    @endif

                </div>

                <hr class="my-8">

                <!-- CONTACTO -->
                <h3 class="text-2xl font-semibold text-blue-800 mb-3">Contacto</h3>

                <p class="text-gray-700">
                    Si tienes dudas sobre la convocatoria, puedes comunicarte con el comité editorial:
                </p>

                <p class="text-gray-700 mt-2">
                    <strong>Correo:</strong> revista@tesvb.edu.mx  
                </p>

            @else

                <!-- NO HAY CONVOCATORIA ACTIVA -->
                <div class="text-center py-10">
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">No hay convocatorias vigentes</h3>
                    <p class="text-gray-500">
                        Cuando se publique una nueva convocatoria, aparecerá automáticamente aquí.
                    </p>
                </div>

            @endif

        </div>

    </div>
</div>

@endsection
