<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revista Tecnológica del TESVB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Desactiva restricciones del layout del dashboard */
        .max-w-7xl, .container, .mx-auto {
            max-width: 100% !important;
            margin: 0 !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- HEADER -->
    <header class="bg-[#003B8B] text-white py-12 shadow-lg w-full">
        <div class="text-center px-4">
            <h1 class="text-4xl font-extrabold">Revista Tecnológica del TESVB</h1>
            <p class="text-lg opacity-90 mt-2">
                Difundiendo el conocimiento y la investigación estudiantil
            </p>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main class="w-full min-h-screen py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#003B8B] text-white text-center py-4">
        © {{ date('Y') }} Tecnológico Nacional de México — Todos los derechos reservados.
    </footer>

</body>
</html>
