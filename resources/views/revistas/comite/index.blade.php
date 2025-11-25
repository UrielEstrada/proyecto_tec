@extends('layouts.revista')

@section('content')

<div class="w-full flex justify-center">
    <div class="max-w-6xl w-full px-6">

        <div class="bg-white shadow-2xl rounded-2xl p-12 mb-16">

            <!-- TÍTULO -->
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-10">
                Comité Editorial
            </h2>

            @if ($comite->count() > 0)

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    @foreach ($comite as $miembro)
                        <div class="bg-gray-50 border rounded-xl shadow p-6">

                            <h3 class="text-xl font-bold text-blue-800 mb-2">
                                {{ $miembro->cargo }}
                            </h3>

                            <p class="text-gray-700 text-lg">
                                {{ $miembro->persona->nombre }}
                                {{ $miembro->persona->apellido_p }}
                                {{ $miembro->persona->apellido_m }}
                            </p>

                            @if ($miembro->persona->correo)
                                <p class="text-gray-600 mt-2 text-sm">
                                    📧 {{ $miembro->persona->correo }}
                                </p>
                            @endif

                        </div>
                    @endforeach

                </div>

            @else

                <div class="text-center py-10">
                    <h3 class="text-xl text-gray-600 font-semibold">
                        No hay miembros registrados en el comité todavía.
                    </h3>
                </div>

            @endif

        </div>

    </div>
</div>

@endsection
