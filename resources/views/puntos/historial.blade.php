@extends('layouts.app')

@section('title', 'Historial de puntos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">

        <h4 class="mb-3" style="color: #2a8c78;">Historial de puntos</h4>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Acción</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                {{-- Datos estáticos sin BD --}}
                <tr>
                    <td>2025-02-01</td>
                    <td>Registrar hábito: Tomar agua</td>
                    <td style="color: green;">+10</td>
                </tr>
                <tr>
                    <td>2025-02-01</td>
                    <td>Hábito negativo: Fumar</td>
                    <td style="color: red;">-20</td>
                </tr>
                <tr>
                    <td>2025-01-31</td>
                    <td>Registrar hábito: Caminar 30 min</td>
                    <td style="color: green;">+15</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
