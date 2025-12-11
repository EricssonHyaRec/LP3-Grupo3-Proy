@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

{{-- BLOQUE SUPERIOR DE BIENVENIDA --}}
<div class="welcome-banner rounded-3 p-4 mb-4 shadow-sm d-flex align-items-center justify-content-between">
    <div>
        <h2 class="fw-bold mb-1 text-dark" style="font-size:28px;">
            👋 Bienvenid@, <span style="color:#2a8c78;">{{ Auth::user()->name }}</span>
        </h2>
        <p class="text-muted mb-0" style="font-size:14px;">
            "Construir hábitos es construir a tu mejor versión."
        </p>
    </div>
    <div>
        <i class="bi bi-person-circle" style="font-size:50px; color:#2a8c78;"></i>
    </div>
</div>

{{-- TARJETAS DE PUNTOS Y METAS --}}
<div class="row mb-4 g-3">

    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 text-center p-3">
            <h5 class="fw-semibold text-muted">Tus Puntos</h5>
            <h3 class="fw-bold" style="color:#2a8c78;">{{ Auth::user()->puntos }}</h3>
            <p class="text-muted mb-0">Sigue avanzando, cada día cuenta 💪</p>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 text-center p-3" style="background:#c7f1c2;">
            <h5 class="fw-semibold text-dark">Meta de agua</h5>
            <h3 class="fw-bold text-dark">2 L</h3>
            <p class="text-dark mb-0">Tu consumo diario</p>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm border-0 text-center p-3" style="background:#fca9aa;">
            <h5 class="fw-semibold text-dark">Horas de sueño</h5>
            <h3 class="fw-bold text-dark">7h 30m</h3>
            <p class="text-dark mb-0">Revisa tu descanso</p>
        </div>
    </div>

</div>

{{-- TABLA DE HÁBITOS RECIENTES --}}
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="fw-semibold mb-3" style="color: #2a8c78;">Tus hábitos recientes</h4>

        <table class="table table-hover align-middle">
            <thead style="background-color: #cdeee6;">
                <tr>
                    <th class="fw-semibold text-dark">Hábito</th>
                    <th class="fw-semibold text-dark">Fecha</th>
                    <th class="fw-semibold text-dark">Progreso</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <tr>
                    <td>Beber agua</td>
                    <td>Hoy</td>
                    <td><span class="badge bg-success">Completado</span></td>
                </tr>
                <tr>
                    <td>Horas de sueño</td>
                    <td>Ayer</td>
                    <td><span class="badge bg-warning text-dark">En proceso</span></td>
                </tr>
                <tr>
                    <td>Alimentación</td>
                    <td>Hoy</td>
                    <td><span class="badge bg-success">Completado</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333 !important;
        background: #f7f7f7;
    }

    .welcome-banner {
        background: #e9f7f3;
        border-left: 6px solid #2a8c78;
    }

    .card {
        border-radius: 14px !important;
    }

    .table thead th {
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    /* Tarjetas de progreso */
    .card h3 {
        font-size: 26px;
    }

    .card p {
        font-size: 14px;
    }

    /* Badge personalizado */
    .badge {
        font-size: 0.85rem;
        padding: 0.5em 0.75em;
        border-radius: 12px;
    }

    @media (max-width: 768px) {
        .welcome-banner {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>
@endsection
