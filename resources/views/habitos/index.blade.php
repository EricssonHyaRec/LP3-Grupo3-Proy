@extends('layouts.app')

@section('title', 'Mis hábitos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">

        @if(session('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <!-- BOTÓN NUEVO HÁBITO -->
        <a href="{{ route('habitos.create') }}" class="btn custom-btn mt-2">
            + registrar nuevo hábito
        </a>

        <div class="row mt-4">

            <!-- ===========================================================
                 COLUMNA IZQUIERDA — HÁBITOS POSITIVOS
            ============================================================ -->
            <div class="col-md-6 mb-4">

                <!-- FILTROS -->
                <div class="mb-3">
                    <ul class="nav nav-pills filtro-tipos" style="font-size: 14px; font-weight: 600;">
                        <li class="nav-item me-2 mb-1">
                            <a href="{{ route('habitos.index') }}"
                               class="nav-link custom-pill-sm {{ request('tipo') ? '' : 'active-custom' }}"
                               style="background-color:#c2e8e3;">
                                todos
                            </a>
                        </li>

                        <li class="nav-item me-2 mb-1">
                            <a href="{{ route('habitos.index', ['tipo' => 'agua']) }}"
                               class="nav-link custom-pill-sm {{ request('tipo') == 'agua' ? 'active-custom' : '' }}"
                               style="background-color:#5cd1c820; border-bottom:3px solid #5cd1c8;">
                                agua
                            </a>
                        </li>

                        <li class="nav-item me-2 mb-1">
                            <a href="{{ route('habitos.index', ['tipo' => 'sueño']) }}"
                               class="nav-link custom-pill-sm {{ request('tipo') == 'sueño' ? 'active-custom' : '' }}"
                               style="background-color:#b5a9f520; border-bottom:3px solid #b5a9f5;">
                                sueño
                            </a>
                        </li>

                        <li class="nav-item me-2 mb-1">
                            <a href="{{ route('habitos.index', ['tipo' => 'actividad']) }}"
                               class="nav-link custom-pill-sm {{ request('tipo') == 'actividad' ? 'active-custom' : '' }}"
                               style="background-color:#7bd67120; border-bottom:3px solid #7bd671;">
                                actividad física
                            </a>
                        </li>

                        <li class="nav-item me-2 mb-1">
                            <a href="{{ route('habitos.index', ['tipo' => 'comida']) }}"
                               class="nav-link custom-pill-sm {{ request('tipo') == 'comida' ? 'active-custom' : '' }}"
                               style="background-color:#f7c57d20; border-bottom:3px solid #f7c57d;">
                                alimentación
                            </a>
                        </li>
                    </ul>
                </div>

                <h4 class="titulo-bloque">Hábitos positivos</h4>

                @forelse($positivos as $hab)
                    <div class="habit-card {{ $hab->tipo }}">

                        <div class="habit-nombre">{{ $hab->nombre }}</div>

                        <div class="habit-detalle">
                            +{{ $hab->puntos_por_unidad }} por {{ $hab->unidad }}
                        </div>

                        <!-- FECHA LÍMITE -->
                        <div class="text-muted" style="font-size:13px;">
                            Fecha límite: {{ $hab->fecha_limite }}
                        </div>

                        <!-- BOTÓN REALIZADO -->
                        @if(!$hab->realizado)
                            <div class="btn-completar-wrap">
                                <form action="{{ route('habitos.completar', $hab->id) }}" method="POST">
                                    @csrf
                                    <button class="btn-completar">
                                        <span class="check-icon">Realizado :)</span>
                                        
                                    </button>
                                </form>
                            </div>
                        @endif



                    </div>
                @empty
                    <p class="text-muted">No tienes hábitos positivos registrados.</p>
                @endforelse
            </div>

            <!-- ===========================================================
                 COLUMNA DERECHA — HÁBITOS NEGATIVOS
            ============================================================ -->
            <div class="col-md-6 mb-4">

                <h4 class="titulo-bloque negativo">Hábitos negativos</h4>

                @forelse($negativos as $hab)
                    <div class="habit-card negativo {{ $hab->tipo }}">

                        <div class="habit-nombre">{{ $hab->nombre }}</div>

                        <div class="habit-detalle">
                            -{{ $hab->puntos_por_unidad }} por {{ $hab->unidad }}
                        </div>

                        <div class="text-muted" style="font-size:13px;">
                            Fecha límite: {{ $hab->fecha_limite }}
                        </div>

                        @if(!$hab->realizado)
                            <div class="btn-completar-wrap">
                                <form action="{{ route('habitos.completar', $hab->id) }}" method="POST">
                                    @csrf
                                    <button class="btn-completar">
                                        <span class="check-icon">Realizado :(</span>
                                        
                                    </button>
                                </form>
                            </div>
                        @endif


                    </div>
                @empty
                    <p class="text-muted">No tienes hábitos negativos registrados.</p>
                @endforelse

            </div>

        </div>
    </div>
</div>
@endsection
