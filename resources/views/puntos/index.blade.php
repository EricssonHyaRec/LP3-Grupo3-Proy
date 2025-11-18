@extends('layouts.app')

@section('title', 'Mis puntos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body text-center">

        <h4 class="mb-3" style="color: #2a8c78;">Mis puntos</h4>

        {{-- puntos estáticos solo para la entrega --}}
        <div style="font-size: 48px; font-weight: bold; color: #2a8c78;">
            1250
        </div>

        <p class="text-muted mb-4">Puntos acumulados hasta hoy</p>

        <a href="{{ route('puntos.historial') }}" class="btn btn-success">
            Ver historial de puntos
        </a>
    </div>
</div>
@endsection
