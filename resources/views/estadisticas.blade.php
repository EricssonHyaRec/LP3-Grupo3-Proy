@extends('layouts.app')

@section('title', 'Estadísticas')

@section('content')

{{-- ENCABEZADO --}}
<div class="welcome-banner rounded-3 p-4 mb-4 shadow-sm">
    <h2 class="fw-bold text-dark mb-1">Estadísticas Generales</h2>
    <p class="text-muted mb-0">Resumen estático de tus hábitos y progreso.</p>
</div>

<div class="container">

    {{-- TARJETAS PRINCIPALES --}}
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Hábitos Completados</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">42</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Racha Actual</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">7 días</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Puntos Ganados</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">120</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h6 class="text-muted">Maximo de puntos</h6>
                    <h3 class="fw-bold" style="color:#2a8c78;">10000</h3>
                </div>
            </div>
        </div>

    </div>


    {{-- GRAFICOS --}}
    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold" style="color:#2a8c78;">Hábitos por Semana</div>
                <div class="card-body">
                    <canvas id="habitsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold" style="color:#2a8c78;">Puntos por Semana</div>
                <div class="card-body">
                    <canvas id="pointsChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('habitsChart'), {
    type: 'line',
    data: {
        labels: ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
        datasets: [{
            label: "Hábitos completados",
            data: [3, 4, 5, 2, 6, 4, 5],
            borderColor: "#2a8c78",
            backgroundColor: "rgba(42,140,120,0.2)",
            fill: true
        }]
    }
});

new Chart(document.getElementById('pointsChart'), {
    type: 'bar',
    data: {
        labels: ["Semana 1", "Semana 2", "Semana 3", "Semana 4"],
        datasets: [{
            label: "Puntos",
            data: [40, 55, 30, 70],
            backgroundColor: "#2a8c78"
        }]
    }
});
</script>
@endsection
