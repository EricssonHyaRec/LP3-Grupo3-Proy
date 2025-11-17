<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts de Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background: #f4fdf8 !important; /* verde muy suave */
        }

/* NAVBAR verde menta elegante */
.navbar-custom {
    background: linear-gradient(90deg, #4fbf9f, #2f8e78);
    color: white !important;
}


/* Opciones del menú */
.navbar-custom .nav-link {
    font-weight: 600;
    color: #ffffff !important;
    transition: 0.25s ease;
    padding: 10px 18px;
    margin-left: 18px;            /* ← MÁS SEPARACIÓN */
    border-radius: 12px;          /* Borde más suave */
    border: 1px solid rgba(255, 255, 255, 0.25);
}

/* Hover elegante */
.navbar-custom .nav-link:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: rgba(255, 255, 255, 0.5);
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
    color: #ffffff !important;
}


        /* Card estilo moderno */
        .card {
            border-radius: 18px;
            border: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body style="font-family: 'Poppins', sans-serif;">

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm sticky-top">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fs-3 fw-bold text-white" href="{{ url('/inicio') }}" style="color: #ffffff !important;">
            Habits+
        </a>

        <!-- BOTÓN MÓVIL -->
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENÚ CENTRADO -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarContent">

            <ul class="navbar-nav gap-3">

                <li class="nav-item">
                    <a class="nav-link" href="/habitos">Registrar Hábito</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/estadisticas">Estadísticas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/puntos">Puntos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/perfil">Perfil</a>
                </li>
               <li>
    <button class="btn btn-danger w-100 text-start"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </button>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
            </ul>
            

        </div>

    </div>
</nav>


    <!-- CONTENIDO -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>