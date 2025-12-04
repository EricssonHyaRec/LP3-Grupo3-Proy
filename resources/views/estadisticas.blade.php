@extends('layouts.app')

@section('title', 'Estadísticas')

@section('content')

{{-- ENCABEZADO --}}
<div class="welcome-banner rounded-3 p-4 mb-4 shadow-sm">
    <h2 class="fw-bold text-dark mb-1">Estadísticas Generales</h2>
    <p class="text-muted mb-0">
        Resumen en tiempo real de tus hábitos y progreso.
    </p>
</div>

<div class="container">

    {{-- TARJETAS PRINCIPALES --}}
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Hábitos Completados</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">
                        {{ $totalHabitosCompletados }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Racha Actual</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">
                        {{ $racha }} día{{ $racha === 1 ? '' : 's' }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Puntos Ganados</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">
                        {{ $puntosGanados }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Máximo de puntos</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">
                        {{ $maxPuntos }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    {{-- CARDS DE SUEÑO Y ALIMENTACIÓN --}}
    <div class="row mb-4">

        <div class="col-md-6 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Horas de sueño (últimos 7 días)</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">
                        {{ $totalHorasSueno }} h
                    </h3>
                    <p class="text-muted mb-0">
                        Promedio diario: <strong>{{ $promedioHorasSueno }} h</strong>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Veces que comiste (últimos 7 días)</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">
                        {{ $vecesComio }}
                    </h3>
                    <p class="text-muted mb-0">
                        Cada hábito de tipo alimentación se cuenta como una comida.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- GRÁFICOS DE AGUA Y ACTIVIDAD FÍSICA --}}
    <div class="row mb-4">

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold" style="color:#2a8c78;">
                    Cantidad de agua (últimos 7 días)
                </div>
                <div class="card-body">
                    <canvas id="aguaChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3   ">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold" style="color:#2a8c78;">
                    Actividad física (últimos 7 días)
                </div>
                <div class="card-body">
                    <canvas id="actividadChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    {{-- GRÁFICO DE TIEMPO EN PANTALLA --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold" style="color:#2a8c78;">
                    Tiempo de pantalla (últimos 7 días)
                </div>
                <div class="card-body">
                    <canvas id="pantallaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection



{{-- ============================
    ESTILOS PERSONALIZADOS
============================= --}}
@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif !important;
    }

    .welcome-banner {
        background: #e9f7f3;
        border-left: 6px solid #2a8c78;
    }

    .stat-card {
        border-radius: 14px !important;
        background: #ffffff;
    }

    .card-header {
        background: #cdeee6 !important;
        border-bottom: none;
    }
</style>
@endsection



{{-- ============================
    SCRIPTS (CHARTS)
============================= --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labelsDias   = @json($labelsDias);
    const datosAgua    = @json($datosDiasAgua);
    const datosAct     = @json($datosDiasAct);
    const datosPant    = @json($datosDiasPant);

    // Agua
    new Chart(document.getElementById('aguaChart'), {
        type: 'line',
        data: {
            labels: labelsDias,
            datasets: [{
                label: 'Cantidad de agua',
                data: datosAgua,
                borderColor: '#2a8c78',
                backgroundColor: 'rgba(42,140,120,0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Actividad física
    new Chart(document.getElementById('actividadChart'), {
        type: 'bar',
        data: {
            labels: labelsDias,
            datasets: [{
                label: 'Actividad física (horas/minutos)',
                data: datosAct,
                backgroundColor: '#2a8c78'
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Tiempo en pantalla
    new Chart(document.getElementById('pantallaChart'), {
        type: 'line',
        data: {
            labels: labelsDias,
            datasets: [{
                label: 'Horas de pantalla',
                data: datosPant,
                borderColor: '#d94f70',
                backgroundColor: 'rgba(217,79,112,0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
