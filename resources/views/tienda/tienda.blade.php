@extends('layouts.app')

@section('title', 'tienda de regalos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="mb-3" style="color: #2a8c78;">tienda de regalos</h4>

        <p class="text-muted">
            aquí podrás canjear tus puntos por alimentos y recompensas saludables.
            por ahora esta sección es solo de demostración. más adelante se conectará con la lógica de canje.
        </p>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">ensalada de frutas</h5>
                        <p class="card-text text-muted">una porción de frutas frescas.</p>
                        <p style="color: #2a8c78; font-weight: bold;">150 puntos</p>
                        <button class="btn btn-secondary btn-sm" disabled>
                            canjear (próximamente)
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">yogurt natural</h5>
                        <p class="card-text text-muted">vaso de yogurt bajo en azúcar.</p>
                        <p style="color: #2a8c78; font-weight: bold;">120 puntos</p>
                        <button class="btn btn-secondary btn-sm" disabled>
                            canjear (próximamente)
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">snack saludable</h5>
                        <p class="card-text text-muted">mix de frutos secos.</p>
                        <p style="color: #2a8c78; font-weight: bold;">200 puntos</p>
                        <button class="btn btn-secondary btn-sm" disabled>
                            canjear (próximamente)
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
