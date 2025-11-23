@extends('layouts.revista')

@section('content')

<div class="w-full flex justify-center">
    <div class="max-w-6xl w-full px-6">

        <!-- TARJETA PRINCIPAL -->
        <div class="bg-white shadow-2xl rounded-2xl p-12 mb-16">

            <!-- MENÚ SUPERIOR (DENTRO DE LA TARJETA) -->
            <div class="flex justify-center space-x-10 mb-12 text-lg font-semibold">
                <a href="{{ route('revistas.numeros') }}" class="text-blue-700 hover:underline">Ejemplares</a>
                <a href="{{ route('revistas.convocatoria') }}" class="text-blue-700 hover:underline">Convocatoria</a>
                <a href="{{ route('revistas.comite') }}" class="text-blue-700 hover:underline">Comité Editorial</a>
            </div>

            <!-- TITULO PRINCIPAL -->
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Revista Tecnológica Digital</h2>

            <!-- DESCRIPCIÓN -->
            <p class="text-gray-700 leading-relaxed mb-6">
                La Revista Tecnológica del TESVB es una publicación especializada en Ciencias de la Computación y áreas
                afines con arbitraje y dictamen. Su propósito es difundir prototipos, resultados de proyectos e
                investigaciones realizadas por estudiantes de nivel licenciatura.
            </p>

            <!-- MISIÓN -->
            <h3 class="text-2xl font-semibold text-blue-800 mt-10 mb-3">Misión</h3>
            <p class="text-gray-700">
                Brindar un espacio para que los estudiantes publiquen resultados y avances de sus proyectos de investigación.
            </p>

            <!-- OBJETIVOS -->
            <h3 class="text-2xl font-semibold text-blue-800 mt-10 mb-3">Objetivos</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Difundir prototipos y resultados de investigación.</li>
                <li>Impulsar proyectos en formación temprana.</li>
                <li>Fortalecer el desarrollo académico y tecnológico.</li>
                <li>Promover la divulgación científica estudiantil.</li>
            </ul>

            <!-- COBERTURA TEMÁTICA -->
            <h3 class="text-3xl font-bold text-green-700 mt-12 mb-6">Cobertura Temática</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- COMPUTACIÓN -->
                <div class="bg-gray-50 border rounded-xl shadow p-6">
                    <h4 class="text-xl font-bold text-blue-700 mb-2">Ciencias Computacionales</h4>
                    <ul class="list-disc ml-6 text-gray-700 space-y-1">
                        @foreach ($tematicas->where('area', 'computacion') as $item)
                            <li>{{ $item->descripcion }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- ELECTRÓNICA -->
                <div class="bg-gray-50 border rounded-xl shadow p-6">
                    <h4 class="text-xl font-bold text-blue-700 mb-2">Electrónica</h4>
                    <ul class="list-disc ml-6 text-gray-700 space-y-1">
                        @foreach ($tematicas->where('area', 'electronica') as $item)
                            <li>{{ $item->descripcion }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- MECATRÓNICA -->
                <div class="bg-gray-50 border rounded-xl shadow p-6">
                    <h4 class="text-xl font-bold text-blue-700 mb-2">Mecatrónica</h4>
                    <ul class="list-disc ml-6 text-gray-700 space-y-1">
                        @foreach ($tematicas->where('area', 'mecatronica') as $item)
                            <li>{{ $item->descripcion }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- COMITÉ EDITORIAL -->
            <h3 class="text-3xl font-bold text-purple-700 mt-12 mb-4">Comité Editorial</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($comite as $miembro)
                    <div class="bg-gray-50 border rounded-xl shadow p-5">
                        <h4 class="text-lg font-bold text-gray-900">{{ $miembro->cargo }}</h4>
                        <p class="text-gray-700">
                            {{ $miembro->persona->nombre }}
                            {{ $miembro->persona->apellido_p }}
                            {{ $miembro->persona->apellido_m }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>

@endsection
