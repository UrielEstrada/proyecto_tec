<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Difusión - TECNM</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .hero-bg {
            background: linear-gradient(135deg, #003b7a, #005bbf);
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

<!-- HERO -->
<section class="hero-bg text-white py-20 px-4 text-center rounded-b-[50px] shadow-lg">
    <h1 class="text-4xl md:text-5xl font-extrabold">Bienvenido al Portal de Difusión del TECNM</h1>
    <p class="mt-4 text-lg md:text-xl opacity-90">
        Selecciona una de las opciones para continuar
    </p>
</section>

<!-- OPCIONES PRINCIPALES -->
<div class="max-w-5xl mx-auto mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 px-6">

    <!-- Opción Posgrados -->
    <a href="{{ route('posgrados.index') }}"
       class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-2 hover:shadow-2xl transition">
        <div class="text-6xl text-blue-600">🎓</div>
        <h3 class="mt-4 text-2xl font-bold text-blue-700">Difusión de Posgrados</h3>
        <p class="mt-2 text-gray-600">
            Consulta información, convocatorias y material académico para los programas de posgrado.
        </p>
    </a>

    <!-- Opción Revista Digital -->
    <a href="{{ route('revistas.index') }}"
       class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-2 hover:shadow-2xl transition">
        <div class="text-6xl text-blue-600">📚</div>
        <h3 class="mt-4 text-2xl font-bold text-blue-700">Revista Digital</h3>
        <p class="mt-2 text-gray-600">
            Plataforma de artículos, investigaciones y material académico del Tecnológico.
        </p>
    </a>

</div>

<!-- INFORMACIÓN GENERAL -->
<div class="max-w-4xl mx-auto mt-16 bg-white p-8 shadow-md rounded-2xl px-6">
    <h3 class="text-3xl font-bold text-center text-blue-700 mb-4">Información General del Tecnológico</h3>
    <p class="text-gray-700 text-lg leading-relaxed text-justify">
        El Tecnológico Nacional de México, campus Valle de Bravo, es una institución comprometida
        con la formación profesional, la investigación científica y el desarrollo tecnológico del país.
        Este portal tiene como propósito facilitar la difusión académica mediante plataformas accesibles y modernas.
    </p>
</div>

<!-- FOOTER -->
<footer class="mt-20 bg-blue-900 text-white py-4 text-center">
    © {{ date('Y') }} Tecnológico Nacional de México – Todos los derechos reservados.
</footer>

</body>
</html>
