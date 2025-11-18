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

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
    padding: 10px 12px;
    margin-left: 18px;  
    border-radius: 10px;      /* Para el hover */
    border: none !important;  /* Elimina el cuadro */
}

/* HOVER CON CUADRO SUAVE */
.navbar-custom .nav-link:hover {
    background: rgba(255, 255, 255, 0.22);   /* Cuadro suave */
    color: #ffffff !important;
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.35);
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
        <a class="navbar-brand fs-3 fw-bold text-white" href="{{ url('/inicio') }}">
            Habits+
        </a>

        <!-- BOTÓN PARA MÓVIL -->
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENÚ -->
        <div class="collapse navbar-collapse" id="navbarContent">

            <!-- LINKS CENTRADOS -->
            <ul class="navbar-nav mx-auto gap-3">

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

                <!-- PUNTOS -->
                <li class="nav-item d-flex align-items-center ms-3">
                    <i class="bi bi-coin fs-4 text-warning me-1"></i>
                    <span class="fw-bold">320</span>
                </li>
            </ul>

            <!-- USUARIO (DERECHA) -->
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item d-flex align-items-center">
                        <!-- Usuario -->
                        <span class="nav-link d-flex align-items-center">
                            <i class="bi bi-person-circle fs-4 me-2"></i>
                            {{ Auth::user()->name }}
                        </span>
                    </li>

                    <!-- BOTÓN LOGOUT FUERA DEL DROPDOWN -->
                    <li class="nav-item d-flex align-items-center ms-2">
                        <a class="btn btn-light btn-sm fw-bold"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
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