@extends('layouts.app')

@section('title', 'mis hábitos')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">

        @if(session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0" style="color: #2a8c78;">mis hábitos</h4>
            <a href="{{ route('habitos.create') }}" class="btn btn-success btn-sm">
                + registrar nuevo hábito
            </a>
        </div>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>tipo</th>
                    <th>polaridad</th>
                    <th>unidad</th>
                    <th>puntos por unidad</th>
                </tr>
            </thead>
            <tbody>
                @forelse($habitos as $habito)
                    <tr>
                        <td>{{ $habito->nombre }}</td>
                        <td>{{ $habito->tipo }}</td>
                        <td>{{ $habito->polaridad }}</td>
                        <td>{{ $habito->unidad }}</td>
                        <td>{{ $habito->puntos_por_unidad }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            aún no has registrado hábitos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
