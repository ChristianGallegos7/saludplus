@extends('layouts.app')

@section('titulo')
    Panel de Administrador
@endsection

@section('contenido')
    <p class="font-bold text-center">Bienvenido al sistema de administración de SaludPlus: {{ auth()->user()->name }}</p>

    <div class="mt-8 text-center">
        <div class="chart-container mx-auto" style="position: relative; width: 500px; height: 300px;">
            <canvas id="myChart"></canvas>
        </div>
    </div>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Citas Médicas', 'Doctores'],
                datasets: [{
                    label: 'Cantidad',
                    data: [{{ $totalMedicalAppointments }}, {{ $totalDoctors }}],
                    backgroundColor: [
                        'rgba(0, 143, 57)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0, 143, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
