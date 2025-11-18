@extends('layouts.app')

@section('title', 'Usuarios - Admin')

@section('content')

<h1 class="mb-4">Panel de Administración</h1>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Lista de Usuarios</h5>
    </div>

    <div class="card-body">

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $u)
                    <tr>
                        <td>{{ $u['id'] }}</td>
                        <td>{{ $u['name'] }}</td>
                        <td>{{ $u['email'] }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" disabled>
                                Eliminar
                            </button>
                            <!-- Está deshabilitado porque todavía no funciona -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection