@extends('principal.index')
@section('content')
@include('sistema.components.header')

<div class="row">
    <div class="card col-lg-12">

        <div class="card-body">    
            <div>
                <div class="container" style="height:90vh">
                    <div class="row">
                        <div class="col-lg-2 border text-center" style='color:white; background-color: #FF2E00;'>
                            COVID
                        </div>
                        <div class="col-lg-10 border text-center" style='color:white; background-color: #FF2E00;'>
                            REPORTE EPIDEMIOLOGICO DEPARTAMENTAL
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 border text-center" style='color:white; background-color: #0059FF;'>
                            FECHA
                        </div>
                        <div class="col-lg-10 border text-center" style='color:white; background-color: #0059FF;'>
                            DATOS POR PROVINCIAS
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 border text-center" style='color:white; background-color: #28B463;'>
                            <div class="row">
                                <div class="col-lg-12 border text-center">  
                                    <div class="row">
                                        <div class="col-lg-12 border text-center" style='color:white; background-color: #28B463'>
                                            CONFIRMADOS HOY
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 border text-center" style='color:black; background-color: white'>
                                            {{ @casosHoy('confirmados') }}
                                        </div>                            
                                    </div>
                                </div>
                                <div class="col-lg-12 border text-center">
                                    @foreach ( @provincias() as $provincia )                                                             
                                    <div class="row">
                                        <div class="col-lg-8 border text-center" style='color:white; background-color: #28B463; font-size: 13px;'>
                                            <a  href="#" data-toggle="modal" 
                                            data-target="#reporte-provincia{{ $provincia->id }}" 
                                            style="text-decoration: none; color: white">
                                             {{$provincia->nombre }}</a> 
                                              <!-- Modal -->


                                        
                                        
                                        </div>
                                        <div class="col-lg-4 border text-center" style='color:black; background-color: white'>
                                           <a href="#" data-toggle="modal" 
                                           data-target="#reporte-decesos-provincia{{ $provincia->id }}" 
                                           style="text-decoration: none;"
                                           >
                                            {{@countCasosActualesProvincias($provincia->id,'confirmados') }}                                       
                                           </a> 
                                           <div id="reporte-decesos-provincia{{ $provincia->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header alert-default-success">
                                                            <h5 class="modal-title" id="my-modal-title">Provincia {{ $provincia->nombre }} </h5>
                                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body" >
                                                            @if (casosActualesProvincias($provincia->id,'confirmados')->count())
                                                                
                                                                <table class="table table-active" style='color: #424949'>
                                                                    <thead>
                                                                        <th>Paciente</th>
                                                                        <th>Municipio</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach (casosActualesProvincias($provincia->id,'confirmados') as $caso)
                                                                        <tr>
                                                                            <td>{{  $caso->nombre }} {{ $caso->apellidos }}</td>
                                                                            <td>{{  $caso->municipio }} </td>
                                                                        </tr>
                                                                        @endforeach
                                                                
                                                                    </tbody>
                                                                
                                                                </table>
                                                            @else
                                                                <div class="border">
                                                                    <h5 class="text-center p-2 title">
                                                                        No existe ninguna persona contagiada :)
                                                                    </h5>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-dismiss="modal" aria-label="Close" type="button" 
                                                            class="btn btn-secondary btn-sm">Cerrar</button>
                                                            <a href="{{ route('provincia.reporte-diario-confirmados.pdf', ['id'=>$provincia->id]) }}" 
                                                            class="btn btn-info btn-sm"><i class="fa fa-file-pdf"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>                          
                        </div>
                        <div class="col-lg-8 border text-center" style='color:white; background-color: white;'>                         
                                <div class="row">
                                    <div class="col-lg-12 border text-center height:100%">
                                        <div class="position-relative mb-4 p-3">
                                            <canvas id="chartTotal"  height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 border text-center" style='color:white; background-color: #FFEC00;'>
                                        <div class="row">
                                            <div class="col-lg-12 p-1 border text-center" style='color:white; background-color: #EA5109'>
                                                CONFIRMADOS
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 border text-center" style='color:black; background-color: white'>
                                                {{ @casosHoy('confirmados') }}
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 border text-center" style='color:white; background-color: #FFEC00;'>
                                        <div class="row">
                                            <div class="col-lg-12 p-1 border text-center" style='color:white; background-color: #EA5109'>
                                                RECUPERADOS
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 border text-center" style='color:black; background-color: white'>
                                                {{ @casosHoy('recuperados') }}
                                                
                                            </div>                            
                                        </div>
                                    </div>
                                    <div class="col-lg-4 border text-center" style='color:white; background-color: #FFEC00;'>
                                        <div class="row">
                                            <div class="col-lg-12 p-1 border text-center" style='color:white; background-color: #EA5109'>
                                                DECESOS
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 border text-center" style='color:black; background-color: white'>
                                                {{ @casosHoy('desesos') }}
                                            </div>                            
                                        </div>
                                    </div>
                                </div>                          
                        </div>
                        <div class="col-lg-2 border text-center" style='color:white; background-color: #424949;'>
                            <div class="row">
                                <div class="col-lg-12 border text-center">  
                                    <div class="row">
                                        <div class="col-lg-12 border text-center" style='color:white; background-color: #1e1f21'>
                                            DECESOS HOY
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 border text-center" style='color:black; background-color: white'>
                                            {{ @casosHoy('desesos') }}
                                        </div>                            
                                    </div>
                                </div>
                                <div class="col-lg-12 border text-center">
                                    @foreach ( @provincias() as $provincia )                                                             
                                    <div class="row">
                                        <div class="col-lg-8 border text-center" style='color:white; background-color:#1b1c1f; font-size: 13px;'>
                                            {{$provincia->nombre}}
                                        </div>
                                        <div class="col-lg-4 border text-center" style='color:black; background-color: white'>
                                            <a href="#" data-toggle="modal" 
                                            data-target="#reporte-provincia{{ $provincia->id }}" 
                                            style="text-decoration: none;"
                                            >
                                             {{@countCasosActualesProvincias($provincia->id,'desesos') }}                                       
                                            </a> 
                                            <div id="reporte-provincia{{ $provincia->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                 <div class="modal-dialog" role="document">
                                                     <div class="modal-content">
                                                         <div class="modal-header alert-default-success">
                                                             <h5 class="modal-title" id="my-modal-title">Provincia {{ $provincia->nombre }} </h5>
                                                             <button class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                             </button>
                                                         </div>
 
                                                         <div class="modal-body" >
                                                             @if (casosActualesProvincias($provincia->id,'desesos')->count())
                                                                 
                                                                 <table class="table table-active" style='color: #424949'>
                                                                     <thead>
                                                                         <th>Paciente</th>
                                                                         <th>Municipio</th>
                                                                     </thead>
                                                                     <tbody>
                                                                         @foreach (casosActualesProvincias($provincia->id,'desesos') as $caso)
                                                                         <tr>
                                                                             <td>{{  $caso->nombre }} {{ $caso->apellidos }}</td>
                                                                             <td>{{  $caso->municipio }} </td>
                                                                         </tr>
                                                                         @endforeach
                                                                 
                                                                     </tbody>
                                                                 
                                                                 </table>
                                                             @else
                                                                 <div class="border">
                                                                     <h5 class="text-center p-2 title">
                                                                         No existe nigun deceso :)
                                                                     </h5>
                                                                 </div>
                                                             @endif
 
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button data-dismiss="modal" aria-label="Close" type="button" 
                                                             class="btn btn-secondary btn-sm">Cerrar</button>
                                                             <a href="{{ route('provincia.reporte-diario-desesos.pdf', ['id'=>$provincia->id]) }}" 
                                                             class="btn btn-info btn-sm"><i class="fa fa-file-pdf"></i></a>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- {{ @casosActualesProvincias(3,'confirmados')[0]->nombre }} --}}
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
    var provincia1   = @json(@countCasosProvincias(1,'confirmados'));
    var provincia2   = @json(@countCasosProvincias(2,'confirmados'));
    var provincia3   = @json(@countCasosProvincias(3,'confirmados'));
    var provincia4   = @json(@countCasosProvincias(4,'confirmados'));
    var provincia5   = @json(@countCasosProvincias(5,'confirmados'));
    var provincia6   = @json(@countCasosProvincias(6,'confirmados'));
    var provincia7   = @json(@countCasosProvincias(7,'confirmados'));
    var provincia8   = @json(@countCasosProvincias(8,'confirmados'));
    var provincia9   = @json(@countCasosProvincias(9,'confirmados'));
    var provincia10  = @json(@countCasosProvincias(10,'confirmados'));
    var provincia11  = @json(@countCasosProvincias(11,'confirmados'));
    var provincia12  = @json(@countCasosProvincias(12,'confirmados'));
    var provincia13  = @json(@countCasosProvincias(13,'confirmados'));
    var provincia14  = @json(@countCasosProvincias(14,'confirmados'));
    var provincia15  = @json(@countCasosProvincias(15,'confirmados'));

    var dataProvincia = @json(@dataProvincia());

    console
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