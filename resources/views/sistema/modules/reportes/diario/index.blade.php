@extends('principal.index')
@section('content')
@include('sistema.components.header')
<div class="row">
    <div class="card col-lg-12">
        <div class="card-header border-0">
            <button onclick='' class="btn btn-info btn-sm">Provincia</button>
            <button onclick='' class="btn btn-info btn-sm">Municipio</button>
            {{-- <div class="d-flex justify-content-between"> 

                @role('administrador')
                    <a href="javascript:void(0);">Ver Reporte</a>
                @endrole
            </div> --}}
        </div>
        <div class="card-body">
            
            <div class="d-flex">
                <p class="d-flex flex-column">
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                </p>
            </div>

         
            <div class="position-relative mb-4">
                <canvas id="chartTotal"  height="100"></canvas>
            </div>

            <div class="position-relative mb-4">
                <canvas id="chartMunicipio"  height="100"></canvas>
            </div>

            <div class="position-relative mb-4">
                <canvas id="chartProvincia"  height="100"></canvas>
            </div>


        <div class="d-flex flex-row justify-content-end">               
        </div>
        </div>
    </div>
</div>

@endsection

@section('charts')

<script src="{{ asset('chart/Chart.min.js') }}" >
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" ></script>
<script>
    

    var confirmados = @json(@covidActuales('confirmados'));
    var recuperados = @json(@covidActuales('recuperados'));
    var sospechosos = @json(@covidActuales('sospechosos'));
    var descartados = @json(@covidActuales('descartados'));
    var desesos     = @json(@covidActuales('desesos'));
    


    var ctx = document.getElementById('chartTotal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Confirmados', 'Recuperados', 'Sospechosos', 'Descartados', 'Desesos'],
            datasets: [{
                label: '# de Casos',
                data: [confirmados, recuperados, sospechosos, descartados, desesos],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

{{-- Provincia --}}
<script>
    var provincia1   = @json(@countCasosActualesProvincias(1,'confirmados'));
    var provincia2   = @json(@countCasosActualesProvincias(2,'confirmados'));
    var provincia3   = @json(@countCasosActualesProvincias(3,'confirmados'));
    var provincia4   = @json(@countCasosActualesProvincias(4,'confirmados'));
    var provincia5   = @json(@countCasosActualesProvincias(5,'confirmados'));
    var provincia6   = @json(@countCasosActualesProvincias(6,'confirmados'));
    var provincia7   = @json(@countCasosActualesProvincias(7,'confirmados'));
    var provincia8   = @json(@countCasosActualesProvincias(8,'confirmados'));
    var provincia9   = @json(@countCasosActualesProvincias(9,'confirmados'));
    var provincia10  = @json(@countCasosActualesProvincias(10,'confirmados'));
    var provincia11  = @json(@countCasosActualesProvincias(11,'confirmados'));
    var provincia12  = @json(@countCasosActualesProvincias(12,'confirmados'));
    var provincia13  = @json(@countCasosActualesProvincias(13,'confirmados'));
    var provincia14  = @json(@countCasosActualesProvincias(14,'confirmados'));
    var provincia15  = @json(@countCasosActualesProvincias(15,'confirmados'));

    var dataProvincia = @json(@dataProvincia());

    var ctx = document.getElementById('chartProvincia').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataProvincia,
            datasets: [{
                label: '# de Casos',
                data: [
                    provincia1,
                    provincia2,
                    provincia3,
                    provincia4,
                    provincia5,
                    provincia6,
                    provincia7,
                    provincia8,
                    provincia9,
                    provincia10,
                    provincia11,
                    provincia12,
                    provincia13,
                    provincia14,
                    provincia15
                    ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



{{-- Municipio --}}
<script>
    // countCasosActualesMunicipio($caso,$id)
    var municipio1   = @json(@countCasosActualesMunicipio('confirmados',1));
    var dataMunicipio = @json(@dataMunicipio());

    var ctx = document.getElementById('chartMunicipio').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataMunicipio 
            ,
            datasets: [{
                label: '# de Casos',
                data: [confirmados, recuperados, sospechosos, descartados, desesos],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }];
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


@endsection