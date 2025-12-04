@extends('layouts.app')

@section('title', 'Historial de puntos')

@section('content')

{{-- ENCABEZADO --}}
<div class="welcome-banner rounded-3 p-4 mb-4 shadow-sm">
    <h2 class="fw-bold text-dark mb-1">Historial de puntos</h2>
    <p class="text-muted mb-0">
        Resumen en tiempo real de tus hábitos completados y progreso en puntos.
    </p>
</div>

<div class="container">

    <h4 class="mb-4 fw-bold" style="color: #2a8c78;">Historial de puntos</h4>

    <div class="table-responsive">
        <table class="table align-middle shadow-sm rounded-3 table-hover">
            <thead class="table-light">
                <tr>
                    <th>Fecha</th>
                    <th>Acción / Hábito</th>
                    <th>Tipo</th>
                    <th class="text-center">Puntos</th>

                </tr>
            </thead>
            <tbody>
                @forelse($historial as $item)
                    <tr>
                        <!-- Fecha -->
                        <td style="width: 160px;">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock-history me-2 text-muted"></i>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($item->fecha)->format('d M Y H:i') }}</small>
                            </div>
                        </td>

                        <!-- Acción / Hábito -->
                        <td>
                            <div class="fw-semibold">{{ $item->accion }}</div>
                        </td>

                        <!-- Tipo -->
                        <td>
                            @if($item->cantidad > 0)
                                <span class="badge bg-success">Positivo</span>
                            @else
                                <span class="badge bg-danger">Negativo</span>
                            @endif
                        </td>

                        <!-- Puntos -->
                        <td class="text-center">
                            <span class="badge rounded-pill px-3 py-2 {{ $item->cantidad > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->cantidad > 0 ? '+' : '' }}{{ $item->cantidad }}
                            </span>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-exclamation-circle fs-3 mb-2"></i><br>
                            No hay historial de puntos todavía.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
