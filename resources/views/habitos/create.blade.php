@extends('layouts.app')

@section('title', 'registrar hábito')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="mb-3" style="color: #2a8c78;">registrar nuevo hábito</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('habitos.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">nombre del hábito</label>
                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    value="{{ old('nombre') }}"
                    placeholder="ej: tomar agua">
            </div>

            <div class="mb-3">
                <label class="form-label">tipo de hábito</label>
                <select name="tipo" class="form-select">
                    <option value="">seleccionar...</option>
                    <option value="agua" {{ old('tipo') == 'agua' ? 'selected' : '' }}>agua</option>
                    <option value="sueño" {{ old('tipo') == 'sueño' ? 'selected' : '' }}>sueño</option>
                    <option value="actividad" {{ old('tipo') == 'actividad' ? 'selected' : '' }}>actividad física</option>
                    <option value="comida" {{ old('tipo') == 'comida' ? 'selected' : '' }}>alimentación</option>
                    <option value="pantalla" {{ old('tipo') == 'pantalla' ? 'selected' : '' }}>uso de pantalla</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">polaridad</label>
                <select name="polaridad" class="form-select">
                    <option value="">seleccionar...</option>
                    <option value="positivo" {{ old('polaridad') == 'positivo' ? 'selected' : '' }}>positivo</option>
                    <option value="negativo" {{ old('polaridad') == 'negativo' ? 'selected' : '' }}>negativo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">unidad de medida</label>
                <input
                    type="text"
                    name="unidad"
                    class="form-control"
                    value="{{ old('unidad') }}"
                    placeholder="ej: vasos, horas, minutos">
            </div>

            <div class="mb-3">
                <label class="form-label">puntos por unidad</label>
                <input
                    type="number"
                    name="puntos_por_unidad"
                    class="form-control"
                    value="{{ old('puntos_por_unidad') }}"
                    placeholder="ej: 10">
            </div>

            <!-- 🌿 NUEVO: FECHA LÍMITE -->
            <div class="mb-3">
                <label class="form-label">fecha límite</label>
                <select name="fecha_opcion" class="form-select" required>
                    <option value="">seleccionar...</option>
                    <option value="hoy">hoy</option>
                    <option value="semana">esta semana</option>
                    <option value="mes">este mes</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                guardar hábito
            </button>

        </form>
    </div>
</div>
@endsection
