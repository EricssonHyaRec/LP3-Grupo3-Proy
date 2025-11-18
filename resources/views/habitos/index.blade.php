@extends('layouts.app')

@section('title', 'Mis hábitos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0" style="color: #2a8c78;">Mis hábitos</h4>
            <a href="{{ route('habitos.create') }}" class="btn btn-success btn-sm">
                + Registrar nuevo hábito
            </a>
        </div>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Polaridad</th>
                    <th>Unidad</th>
                    <th>Puntos por unidad</th>
                </tr>
            </thead>
            <tbody>
                {{-- datos de ejemplo (no bd) --}}
                <tr>
                    <td>Tomar agua</td>
                    <td>AGUA</td>
                    <td>Positivo</td>
                    <td>vasos</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Fumar</td>
                    <td>TABACO</td>
                    <td>Negativo</td>
                    <td>cigarrillos</td>
                    <td>-20</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
