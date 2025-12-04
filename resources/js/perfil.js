// Abrir/editar perfil
document.getElementById('btnEditarPerfil')?.addEventListener('click', function () {
    document.getElementById('perfilView').classList.add('d-none');
    document.getElementById('perfilEdit').classList.remove('d-none');
});

document.getElementById('btnCancelarEdit')?.addEventListener('click', function () {
    document.getElementById('perfilEdit').classList.add('d-none');
    document.getElementById('perfilView').classList.remove('d-none');
});

// Actualizar contadores cuando se completa un hábito
document.querySelectorAll('.btn-completar').forEach(btn => {
    btn.addEventListener('click', function() {
        const habitId = this.dataset.id;
        fetch(`/habitos/${habitId}/completar`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.querySelector('#modalPerfil .summary-box div:nth-child(3)').textContent = data.totalHabitosCompletados;
            document.querySelector('#modalPerfil .bi-coin + div').textContent = data.puntos;
            document.querySelector('#modalPerfil .summary-box:nth-child(2) div:nth-child(2)').textContent = data.racha + (data.racha === 1 ? ' día' : ' días');
        })
        .catch(err => console.error('Error al completar hábito:', err));
    });
});