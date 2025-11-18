@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center">Tablero de Estadísticas Comerciales</h2>
            <p class="text-center text-muted">Dashboard de Marketing de Contenidos</p>
        </div>
    </div>

    
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Visitas</h5>
                    <h3>85,200</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Duración Promedio</h5>
                    <h3>95 sec</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Páginas por Visita</h5>
                    <h3>3.5</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Bounce Rate</h5>
                    <h3>59%</h3>
                </div>
            </div>
        </div>

    </div>


    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Visitas por Semana</div>
                <div class="card-body">
                    <canvas id="visitsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header">Bounce Rate por Semana</div>
                <div class="card-body">
                    <canvas id="bounceChart"></canvas>
                </div>
            </div>
        </div>

    </div>

 
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">Fuentes de Tráfico</div>
                <div class="card-body">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">Usuarios Nuevos vs Retorno</div>
                <div class="card-body">
                    <canvas id="userTypeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header">Top 3 Campañas por Conversión</div>
                <div class="card-body">
                    <canvas id="campaignChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('visitsChart'), {
    type: 'line',
    data: {
        labels: ["5", "8", "12", "16", "20", "24", "28", "32", "36", "40", "44", "48", "52"],
        datasets: [{
            label: "Visitas",
            data: [20000, 35000, 22000, 60000, 55000, 50000, 58000, 61000, 57000, 54000, 52000, 48000, 45000],
            borderColor: "#4BC0C0",
            fill: true
        }]
    }
});


new Chart(document.getElementById('bounceChart'), {
    type: 'line',
    data: {
        labels: ["5", "8", "12", "16", "20", "24", "28", "32", "36", "40", "44", "48", "52"],
        datasets: [{
            label: "Bounce %",
            data: [60, 55, 50, 70, 65, 62, 58, 60, 63, 68, 72, 75, 80],
            borderColor: "#FF9F40",
            fill: false
        }]
    }
});


new Chart(document.getElementById('trafficChart'), {
    type: 'pie',
    data: {
        labels: ["Directo", "Orgánico", "Display", "Social", "Referral", "Paid"],
        datasets: [{
            data: [55, 24, 9, 4, 4, 4],
            backgroundColor: ["#FF6384","#36A2EB","#FFCE56","#4BC0C0","#9966FF","#FF9F40"]
        }]
    }
});


new Chart(document.getElementById('userTypeChart'), {
    type: 'bar',
    data: {
        labels: ["Nuevos", "Retorno"],
        datasets: [{
            label: "Usuarios",
            data: [68, 32],
            backgroundColor: ["#36A2EB","#4BC0C0"]
        }]
    }
});


new Chart(document.getElementById('campaignChart'), {
    type: 'bar',
    data: {
        labels: ["Campaña 1", "Campaña 2", "Campaña 3"],
        datasets: [{
            label: "Conversion %",
            data: [18, 11, 10],
            backgroundColor: "#FF9F40"
        }]
    }
});
</script>
@endsection
