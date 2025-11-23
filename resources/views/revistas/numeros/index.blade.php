@extends('layouts.revista')

@section('content')

<div class="w-full flex justify-center">
    <div class="max-w-6xl w-full px-6">

        <!-- TARJETA PRINCIPAL -->
        <div class="bg-white shadow-2xl rounded-2xl p-12 mb-16">

            <!-- TÍTULO -->
            <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Ejemplares Publicados</h2>

            <!-- DESCRIPCIÓN -->
            <p class="text-gray-700 text-center max-w-3xl mx-auto mb-12">
                Consulta los volúmenes publicados de la Revista Tecnológica del TESVB. 
                Cada ejemplar contiene artículos académicos, prototipos, investigaciones y 
                trabajos desarrollados por estudiantes de nivel licenciatura.
            </p>

            <!-- GRID DE EJEMPLARES -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($numeros as $numero)
                    <a href="{{ route('revistas.numero.show', $numero->id_numero) }}"
                        class="block bg-gray-50 border rounded-xl shadow p-6 hover:shadow-lg transition">

                        <h3 class="text-xl font-bold text-blue-700 mb-2">
                            {{ $numero->titulo ?? "Volumen ".$numero->id_numero }}
                        </h3>

                        <p class="text-gray-600 text-sm mb-2">
                            <strong>Fecha de Inicio:</strong> {{ $numero->fecha_inicio }}
                        </p>

                        <p class="text-gray-600 text-sm mb-4">
                            <strong>Fecha de Cierre:</strong> {{ $numero->fecha_fin }}
                        </p>

                        <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                            {{ $numero->tematica->descripcion ?? 'Temática no definida' }}
                        </span>

                    </a>
                @empty

                    <div class="col-span-3 text-center py-20 text-gray-500">
                        No hay ejemplares publicados aún.
                    </div>

                @endforelse

            </div>

        </div>

    </div>
</div>

@endsection
