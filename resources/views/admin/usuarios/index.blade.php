@extends('layouts.app')

@section('title', 'Usuarios - Admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">👑 Panel de Administración</h1>
</div>

<div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-primary text-white rounded-top-4 d-flex align-items-center">
        <i class="bi bi-people-fill fs-4 me-2"></i>
        <h5 class="mb-0">Lista de Usuarios</h5>
    </div>

    <div class="card-body">

        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th class="text-center">ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($usuarios as $u)
                    <tr>
                        <td class="text-center fw-bold">{{ $u['id'] }}</td>
                        <td>{{ $u['name'] }}</td>
                        <td>{{ $u['email'] }}</td>

                        <td class="text-center">
                            <button class="btn btn-outline-danger btn-sm" disabled>
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                            <!-- Aún deshabilitado -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
