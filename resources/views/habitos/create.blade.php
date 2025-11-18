@extends('layouts.app')

@section('title', 'Registrar hábito')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="mb-3" style="color: #2a8c78;">Registrar nuevo hábito</h4>

        <form action="#" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del hábito</label>
                <input type="text" class="form-control" placeholder="Ej: Tomar agua">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de hábito</label>
                <select class="form-select">
                    <option value="">Seleccionar...</option>
                    <option>AGUA</option>
                    <option>SUEÑO</option>
                    <option>ACTIVIDAD</option>
                    <option>COMIDA</option>
                    <option>PANTALLA</option>
                    <option>AZÚCAR</option>
                    <option>TABACO</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Polaridad</label>
                <select class="form-select">
                    <option value="">Seleccionar...</option>
                    <option>Positivo</option>
                    <option>Negativo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Unidad de medida</label>
                <input type="text" class="form-control" placeholder="Ej: vasos, horas, minutos">
            </div>

            <div class="mb-3">
                <label class="form-label">Puntos por unidad</label>
                <input type="number" class="form-control" placeholder="Ej: 10">
            </div>

            <button type="submit" class="btn btn-success">
                Guardar hábito (próximamente)
            </button>

        </form>
    </div>
</div>
@endsection
