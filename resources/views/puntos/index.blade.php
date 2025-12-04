@extends('layouts.app')

@section('title', 'mis puntos')

@section('content')
{{-- ENCABEZADO --}}
<div class="welcome-banner rounded-3 p-4 mb-4 shadow-sm">
    <h2 class="fw-bold text-dark mb-1">Información de puntos</h2>
    <p class="text-muted mb-0">
        Resumen de la cantidad puntos y nivel por puntos acumulados.
    </p>
</div>
<div class="card shadow-sm border-0">
    <div class="card-body text-center">

        <h4 class="mb-3" style="color: #2a8c78;">Mis puntos</h4>

        <div style="font-size: 48px; font-weight: bold; color: #2a8c78;">
            {{ $puntos }}
        </div>

        <p class="text-muted mb-1">puntos acumulados hasta hoy</p>

        {{-- Barra de progreso de nivel --}}
        @php
            $nivelActual = floor($puntos / 100);
            $puntosNivel = $puntos % 100;
        @endphp

        <div class="mt-3 px-4">
            <h6 class="text-muted mb-1" style="font-size: 14px;">
                Progreso hacia el siguiente nivel (Nivel {{ $nivelActual }})
            </h6>

            <div class="progress" style="height: 16px;">
                <div 
                    class="progress-bar" 
                    role="progressbar"
                    style="width: {{ $puntosNivel }}%; background:#2a8c78;"
                >
                    {{ $puntosNivel }}/100
                </div>
            </div>
        </div>

        <a href="{{ route('puntos.historial') }}" class="btn btn-success mt-4">
            ver historial de puntos
        </a>

    </div>
</div>
@endsection
