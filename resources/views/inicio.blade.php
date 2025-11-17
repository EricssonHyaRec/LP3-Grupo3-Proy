@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

{{-- BLOQUE SUPERIOR DE BIENVENIDA --}}
<div class="welcome-banner rounded-3 p-4 mb-4 shadow-sm">
    <h2 class="fw-bold mb-1 text-dark">Bienvenid@, {{ Auth::user()->name }}</h2>
    <p class="text-muted mb-0">"Construir hábitos es construir a tu mejor versión."</p>
</div>

{{-- TARJETA DE PUNTOS --}}
<div class="card mb-4 shadow-sm border-0">
    <div class="card-body text-center">
        <h3 class="fw-bold" style="color: #2a8c78;">{{ $points ?? 100 }} puntos</h3>
        <p class="text-muted mb-0">Sigue avanzando, mi reina. Cada día cuenta</p>
    </div>
</div>

{{-- TABLA DE HÁBITOS --}}
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
    }

    .welcome-banner {
        background: #e9f7f3; /* verde muy suave */
        border-left: 6px solid #2a8c78;
    }

    .table thead th {
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .card {
        border-radius: 14px !important;
    }
</style>
@endsection