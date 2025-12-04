@extends('layouts.app')

@section('title', 'mis puntos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body text-center">

        <h4 class="mb-3" style="color: #2a8c78;">mis puntos</h4>

        <div style="font-size: 48px; font-weight: bold; color: #2a8c78;">
            {{ $puntos }}
        </div>

        <p class="text-muted mb-4">puntos acumulados hasta hoy</p>

        <a href="{{ route('puntos.historial') }}" class="btn btn-success">
            ver historial de puntos
        </a>
    </div>
</div>
@endsection
