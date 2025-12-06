
<!-- MODAL PERFIL DINÁMICO -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="perfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow">

            <!-- HEADER -->
            <div class="modal-header bg-gradient p-3" style="background: linear-gradient(90deg, #4fd4b8, #3faf9f); color:black;">
                <h4 class="modal-title fw-bold"><i class="bi bi-person-circle me-2"></i>Perfil de {{ Auth::user()->name }}</h4>
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-4 text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                             class="rounded-circle border-3 mb-3"
                             width="110" height="110" style="border-color:#2a8c78;">

                        <div id="perfilView">
                            <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
                            <p class="text-muted small mb-1">
                                Miembro desde: <br>
                                <strong>{{ Auth::user()->created_at->format('d M Y') }}</strong>
                            </p>
                            <p class="text-muted small mb-2">
                                Nivel: <strong>{{ floor(Auth::user()->puntos / 100) }}</strong>
                            </p>
                            <button id="btnEditarPerfil" class="btn btn-warning text-white mt-2 px-3">
                                Editar Perfil
                            </button>
                        </div>

                        <!-- FORMULARIO DE EDICIÓN -->
                        <div id="perfilEdit" class="d-none mt-3">
                            <form method="POST" action="{{ route('perfil.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="fw-semibold">Nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-semibold">Correo</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-semibold">Nueva contraseña</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="fw-semibold">Confirmar contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                <button class="btn text-white px-4" style="background:#2a8c78;">Guardar cambios</button>
                                <button id="btnCancelarEdit" type="button" class="btn btn-secondary px-3 ms-2">Cancelar</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row g-3">

                            <div class="col-6 col-md-4">
                                <div class="summary-box p-3 rounded-3 text-center bg-light shadow-sm">
                                    <i class="bi bi-check2-circle fs-4 text-success"></i>
                                    <div class="fw-bold mt-1">Hábitos</div>
                                    <div>{{ $totalHabitosCompletados ?? 0 }}</div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="summary-box p-3 rounded-3 text-center bg-light shadow-sm">
                                    <i class="bi bi-fire fs-4 text-danger"></i>
                                    <div class="fw-bold mt-1">Racha</div>
                                    <div>{{ $racha ?? 0 }} día{{ ($racha ?? 0) === 1 ? '' : 's' }}</div>
                                </div>
                            </div>

                            <div class="col-6 col-md-4">
                                <div class="summary-box p-3 rounded-3 text-center bg-light shadow-sm">
                                    <i class="bi bi-coin fs-4 text-warning me-1"></i>
                                    <div class="fw-bold mt-1">Puntos</div>
                                    <div>{{ $puntosGanados ?? Auth::user()->puntos }}</div>
                                </div>
                            </div>

                            <div class="col-6 col-md-6">
                                <div class="summary-box p-3 rounded-3 text-center bg-light shadow-sm">
                                    <i class="bi bi-trophy fs-4 text-primary"></i>
                                    <div class="fw-bold mt-1">Máx Puntos</div>
                                    <div>{{ $maxPuntos ?? Auth::user()->puntos }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- progeso al siguiente nivel -->
                        <div class="mt-4">
                            <h6 class="fw-semibold mb-1">Progreso hacia siguiente nivel</h6>
                            @php
                                $nivelActual = floor(Auth::user()->puntos / 100);
                                $puntosNivel = Auth::user()->puntos % 100;
                            @endphp
                            <div class="progress" style="height: 18px;">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: {{ $puntosNivel }}%;" aria-valuenow="{{ $puntosNivel }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $puntosNivel }}/100 pts
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary text-white px-4" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- script para editar perfil -->
<script>
document.getElementById('btnEditarPerfil').addEventListener('click', function () {
    document.getElementById('perfilView').classList.add('d-none');
    document.getElementById('perfilEdit').classList.remove('d-none');
});

document.getElementById('btnCancelarEdit').addEventListener('click', function () {
    document.getElementById('perfilEdit').classList.add('d-none');
    document.getElementById('perfilView').classList.remove('d-none');
});
document.querySelectorAll('.btn-completar').forEach(btn => {
    btn.addEventListener('click', function() {
        const habitId = this.dataset.id; // suponiendo que cada botón tenga data-id
        fetch(`/habitos/${habitId}/completar`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            // actualizar contadores en el modal
            document.querySelector('#modalPerfil .summary-box div:nth-child(3)').textContent = data.totalHabitosCompletados;
            document.querySelector('#modalPerfil .bi-coin + div').textContent = data.puntos;
            document.querySelector('#modalPerfil .summary-box:nth-child(2) div:nth-child(2)').textContent = data.racha + (data.racha === 1 ? ' día' : ' días');
        })
        .catch(err => console.error('Error al completar hábito:', err));
    });
});
</script>