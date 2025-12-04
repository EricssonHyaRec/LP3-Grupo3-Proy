@extends('layouts.app')

@section('title', 'Perfil de Usuario')

@section('content')

<div class="profile-banner rounded-3 p-4 mb-4 shadow-sm d-flex align-items-center">
    
    <div class="me-4">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
             class="rounded-circle border border-3"
             width="95" height="95" style="border-color:#2a8c78;">
    </div>

    <div>
        <h2 class="fw-bold mb-1 text-dark">{{ Auth::user()->name }}</h2>
        <p class="text-muted mb-2">Miembro desde: {{ Auth::user()->created_at->format('d M Y') }}</p>
        <button class="btn btn-sm text-white px-3" style="background:#2a8c78;">Editar Perfil</button>
    </div>

</div>

<div class="card mb-4 shadow-sm border-0">
    <div class="card-body">
        <h4 class="fw-semibold mb-3" style="color:#2a8c78;">Resumen semanal</h4>

        <div class="row text-center">
            <div class="col-md-3 mb-3">
                <div class="summary-box p-3 rounded-3">
                    <h5 class="fw-bold text-dark">Agua</h5>
                    <p class="text-muted mb-0">14 L</p>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="summary-box p-3 rounded-3">
                    <h5 class="fw-bold text-dark">Sueño</h5>
                    <p class="text-muted mb-0">48 h</p>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="summary-box p-3 rounded-3">
                    <h5 class="fw-bold text-dark">Ejercicio</h5>
                    <p class="text-muted mb-0">4 h</p>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="summary-box p-3 rounded-3">
                    <h5 class="fw-bold text-dark">Comidas</h5>
                    <p class="text-muted mb-0">21 registradas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4 shadow-sm border-0">
    <div class="card-body text-center">
        <h3 class="fw-bold" style="color: #2a8c78;">
            {{ Auth::user()->puntos }} puntos
        </h3>
        <p class="text-muted mb-0">Tu constancia te acerca a tus metas. 🌱</p>
    </div>
</div>

<div class="card mb-4 shadow-sm border-0">
    <div class="card-body">
        <h4 class="fw-semibold mb-3" style="color:#2a8c78;">Hábitos registrados</h4>

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Tomar 8 vasos de agua
                <span class="badge bg-success">Positivo</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Dormir antes de las 11pm
                <span class="badge bg-success">Positivo</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Evitar comida rápida
                <span class="badge bg-danger">Negativo</span>
            </li>
        </ul>

        <button class="btn mt-3 text-white" style="background:#2a8c78;">Agregar hábito</button>
    </div>
</div>


@endsection

@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333 !important;
    }

    /* Banner superior */
    .profile-banner {
        background: #e9f7f3; /* verde suave */
        border-left: 6px solid #2a8c78;
    }

    /* Cuadros de resumen */
    .summary-box {
        background: #eefaf6;
        border-left: 5px solid #2a8c78;
    }

    .card {
        border-radius: 14px !important;
    }
</style>
@endsection
