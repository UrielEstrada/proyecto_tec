@extends('layouts.revista')

@section('content')

<div class="w-full flex justify-center">
    <div class="max-w-6xl w-full px-6">

        <!-- TARJETA PRINCIPAL -->
        <div class="bg-white shadow-2xl rounded-2xl p-12 mb-16">

            <!-- TÍTULO PRINCIPAL -->
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-6">Convocatoria</h2>

            <p class="text-gray-700 text-center max-w-3xl mx-auto mb-8">
                Consulta la convocatoria vigente para la publicación de artículos en la 
                <strong>Revista Tecnológica del TESVB</strong>. Aquí encontrarás las fechas, criterios,
                lineamientos y documentos necesarios para enviar tu trabajo.
            </p>

            <hr class="my-8">

            <!-- SECCIÓN: FECHAS IMPORTANTES -->
            <h3 class="text-2xl font-semibold text-blue-800 mb-3">Fechas Importantes</h3>

            <ul class="list-disc text-gray-700 ml-6 space-y-2 mb-8">
                <li><strong>Apertura de convocatoria:</strong> Enero 2025</li>
                <li><strong>Cierre de recepción de artículos:</strong> 22 de diciembre 2025</li>
                <li><strong>Publicación del volumen:</strong> Enero 2026</li>
            </ul>

            <!-- SECCIÓN: REQUISITOS GENERALES -->
            <h3 class="text-2xl font-semibold text-blue-800 mb-3">Requisitos Generales</h3>

            <ul class="list-disc text-gray-700 ml-6 space-y-2 mb-8">
                <li>El artículo debe ser original y no haber sido publicado previamente.</li>
                <li>Debe estar relacionado con las Ciencias de la Computación, Electrónica o Mecatrónica.</li>
                <li>Longitud mínima: 6 páginas. Longitud máxima: 10 páginas.</li>
                <li>Formato: Documento Word o PDF siguiendo la plantilla oficial.</li>
                <li>El porcentaje de similitud debe ser menor al 30% (Turnitin o equivalente).</li>
            </ul>

            <!-- SECCIÓN: DOCUMENTOS DESCARGABLES -->
            <h3 class="text-2xl font-semibold text-blue-800 mb-3">Descargas</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

                <a href="{{ asset('storage/convocatorias/convocatoria.pdf') }}" 
                   target="_blank"
                   class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-bold text-blue-700">📄 Convocatoria Oficial</h4>
                    <p class="text-gray-600 text-sm">Descargar PDF</p>
                </a>

                <a href="{{ asset('storage/convocatorias/plantilla.docx') }}" 
                   target="_blank"
                   class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-bold text-blue-700">📝 Plantilla para Artículos</h4>
                    <p class="text-gray-600 text-sm">Archivo Word</p>
                </a>

                <a href="{{ asset('storage/convocatorias/criterios.pdf') }}"
                   target="_blank"
                   class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-bold text-blue-700">✔️ Criterios de Evaluación</h4>
                    <p class="text-gray-600 text-sm">Normativa completa</p>
                </a>

                <a href="{{ asset('storage/convocatorias/guia.pdf') }}"
                   target="_blank"
                   class="p-5 bg-gray-50 border rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-lg font-bold text-blue-700">📘 Guía de Envío</h4>
                    <p class="text-gray-600 text-sm">Procedimiento para autores</p>
                </a>

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

        </div>

    </div>
</div>

@endsection
