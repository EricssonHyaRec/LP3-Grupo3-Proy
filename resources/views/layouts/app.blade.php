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
:root {
    --mint-base: #3faf9f;
    --mint-deep: #2d8a7d;
    --mint-soft: #e7f8f5;
    --mint-hover: #d4f3ee;
    --cream-bg: #fbf7ef;
    --text-dark: #2e4c46;
    --mint-border: #c2e8e3;
}

/* =========================
   BASE GENERAL
========================= */
body {
    background: var(--cream-bg) !important;
    font-family: "Poppins", sans-serif;
    color: var(--text-dark);
}

/* =========================
   NAVBAR
========================= */
.navbar-custom {
    background: linear-gradient(90deg, #4fd4b8, var(--mint-base));
    padding: 10px 20px;
    border-bottom: 3px solid var(--mint-border);
}
.navbar-custom .nav-link {
    font-weight: 600;
    color: white !important;
    padding: 10px 14px;
    border-radius: 12px;
    transition: .25s;
}
.navbar-custom .nav-link:hover {
    background: rgba(255,255,255,0.15);
    color: white !important;
}

/* =========================
   BOTONES
========================= */
.custom-btn {
    background: var(--mint-base) !important;
    color: white !important;
    font-weight: 600;
    border-radius: 14px;
    padding: 9px 18px;
    font-size: 14px;
    transition: .25s ease;
}
.custom-btn:hover {
    background: var(--mint-deep) !important;
    color: white !important;
}

/* =========================
   TARJETAS / CARD
========================= */
.card {
    border-radius: 22px;
    background: var(--mint-soft);
    border: 1px solid var(--mint-border);
    box-shadow: 0 4px 14px rgba(0,0,0,0.06);
    padding: 10px;
}

/* =========================
   FILTRO (nav-pills)
========================= */

/* Fix global: nunca texto negro al activar */
.filtro-tipos .nav-link,
.filtro-tipos .nav-link * {
    color: inherit !important;
}

.filtro-tipos {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    align-items: center;
    padding-left: 0;
}
.filtro-tipos .nav-item {
    list-style: none;
}

.filtro-tipos .nav-link {
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    background: var(--mint-soft);
    border: 1px solid var(--mint-border);
    color: var(--mint-deep) !important;
    transition: .18s;
    text-align: center;
    min-width: 70px;
}

/* Hover */
.filtro-tipos .nav-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(0,0,0,0.05);
}

/* Estado activo genérico */
.filtro-tipos .nav-link.active-custom {
    font-weight: 700;
    color: var(--text-dark) !important;
}

/* Colores por tipo */
.tipo-todos {
    background: #e0f5f3;
    color: #3a5f5c !important;
}
.tipo-agua {
    background: #e9f6ff;
    color: #1969a5ff !important;
}
.tipo-sueño {
    background: #f3f0ff;
    color: #5b4db3 !important;
}
.tipo-actividad {
    background: #ebffec;
    color: #3d8a32 !important;
}
.tipo-comida {
    background: #fff3e4;
    color: #b98129 !important;
}

/* Activo por tipo */
.tipo-todos.active-custom       { background:#bfe6e3 !important; }
.tipo-agua.active-custom        { background:#c3dcf7 !important; }
.tipo-sueño.active-custom       { background:#d8cffc !important; }
.tipo-actividad.active-custom   { background:#c9f4c3 !important; }
.tipo-comida.active-custom      { background:#ffe0b8 !important; }

/* =========================
   TITULOS
========================= */
.titulo-bloque {
    font-weight: 700;
    font-size: 18px;
    color: var(--mint-deep);
    margin-bottom: 14px;
}
.titulo-bloque.negativo {
    color: #c75050;
}

/* =========================
   TARJETAS DE HÁBITOS
========================= */
.habit-card {
    background: white;
    border: 1px solid var(--mint-border);
    border-radius: 18px;
    padding: 14px 16px;
    margin-bottom: 14px;
    box-shadow: 0 3px 9px rgba(0,0,0,0.05);
    transition: .25s ease;
}
.habit-card:hover {
    background: var(--mint-hover);
    transform: scale(1.02);
}
.habit-nombre {
    font-size: 16px;
    font-weight: 700;
}
.habit-detalle {
    font-size: 13px;
    margin-top: 4px;
    color: #3a746d;
}

/* NEGATIVOS */
.habit-card.negativo {
    background: #ffe6e6;
    border-color: #f4b8b8;
}
.habit-card.negativo .habit-detalle {
    color: #b34d4d;
}

/* Borde lateral por tipo */
.habit-card.agua        { border-left: 8px solid #5c93d1; }
.habit-card.sueño       { border-left: 8px solid #b5a9f5; }
.habit-card.actividad   { border-left: 8px solid #7bd671; }
.habit-card.comida      { border-left: 8px solid #f7c57d; }
.habit-card.pantalla    { border-left: 8px solid #f59393; }
</style>
<style>
    .summary-box {
        background: #eefaf6;
        border-left: 4px solid #2a8c78;
    }

    .card {
        border-radius: 14px !important;
    }

    .modal-body {
        padding-top: 20px !important;
    }
</style>
</head>
<!-- MODAL PERFIL COMPACTO -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="perfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow">

            <!-- ENCABEZADO -->
            <div class="modal-header" style="background:#e9f7f3; border-left:6px solid #2a8c78;">
                <h4 class="modal-title fw-bold">Perfil de Usuario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- CUERPO -->
            <div class="modal-body">

                <div class="row">

                    <!-- IZQUIERDA: FOTO + INFO GENERAL -->
                    <div class="col-md-4 text-center mb-4">

                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                             class="rounded-circle border-3 mb-3"
                             width="110" height="110" style="border-color:#2a8c78;">

                        <h3 class="fw-bold text-dark">{{ Auth::user()->name }}</h3>

                        <p class="text-muted small mb-1">
                            Miembro desde: <br>
                            <strong>{{ Auth::user()->created_at->format('d M Y') }}</strong>
                        </p>

                        <button id="btnEditarPerfil" 
                                class="btn btn-warning text-white mt-2 px-3"
                                >
                            Editar Perfil
                        </button>

                    </div>

                    <!-- DERECHA (Misma proporción SIEMPRE) -->
                    <div class="col-md-8">

                        <!-- ===========================
                             BLOQUE 1 : VISTA (DEFAULT)
                        ============================ -->
                        <div id="perfilView">

                            <h5 class="fw-semibold mb-2" style="color:#2a8c78;">Resumen semanal</h5>

                            <div class="row g-2">

                                <div class="col-6 col-lg-3">
                                    <div class="summary-box p-2 rounded-3 text-center small">
                                        <strong class="text-dark d-block">Agua</strong>
                                        <span class="text-muted">14 L</span>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="summary-box p-2 rounded-3 text-center small">
                                        <strong class="text-dark d-block">Sueño</strong>
                                        <span class="text-muted">48 h</span>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="summary-box p-2 rounded-3 text-center small">
                                        <strong class="text-dark d-block">Ejercicio</strong>
                                        <span class="text-muted">4 h</span>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="summary-box p-2 rounded-3 text-center small">
                                        <strong class="text-dark d-block">Comidas</strong>
                                        <span class="text-muted">21</span>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center my-3">
                                <h3 class="fw-bold mb-0" style="color:#2a8c78;">
                                    {{ Auth::user()->puntos }} pts
                                </h3>
                                <small class="text-muted">Tu constancia te acerca a tus metas 🌱</small>
                            </div>

                        </div>

                        <!-- ===========================
                             BLOQUE 2: FORMULARIO EDITAR
                             (Oculto por defecto)
                        ============================ -->
                        <div id="perfilEdit" class="d-none">

                            <form method="POST" action="{{ route('perfil.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="fw-semibold">Nombre</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{ Auth::user()->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Correo</label>
                                    <input type="email" name="email" class="form-control"
                                           value="{{ Auth::user()->email }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Nueva contraseña</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="fw-semibold">Confirmar contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>

                                <button class="btn text-white px-4" style="background:#2a8c78;">
                                    Guardar cambios
                                </button>

                                <button id="btnCancelarEdit" 
                                        type="button" 
                                        class="btn btn-secondary px-3 ms-2">
                                    Cancelar
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer">
                <button class="btn  btn-secondary text-white px-4" data-bs-dismiss="modal">
                    Cerrar
                </button>
            </div>

        </div>
    </div>
</div>

<!-- SCRIPT PARA CAMBIAR ENTRE VISTA Y EDICIÓN -->
<script>
document.getElementById('btnEditarPerfil').addEventListener('click', function () {
    document.getElementById('perfilView').classList.add('d-none');
    document.getElementById('perfilEdit').classList.remove('d-none');
});

document.getElementById('btnCancelarEdit').addEventListener('click', function () {
    document.getElementById('perfilEdit').classList.add('d-none');
    document.getElementById('perfilView').classList.remove('d-none');
});
</script>

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
                    <a class="nav-link" href="/habitos">Hábitos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/estadisticas">Estadísticas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/puntos">Puntos</a>
            
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tienda') }}">tienda</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">
                        Perfil
                    </a>
                </li>


                <!-- PUNTOS -->
                <li class="nav-item d-flex align-items-center ms-3">
                    <i class="bi bi-coin fs-4 text-warning me-1"></i>
                    <span class="fw-bold">{{ Auth::user()->puntos }}</span>
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

                    <li class="nav-item d-flex align-items-center ms-2">
                        <a class="btn btn-danger btn-sm fw-bold"
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
