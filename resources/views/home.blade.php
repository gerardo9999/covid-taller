@extends('principal.index')
@section('content')
@include('admin.components.header')
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between"> 
                <h3 class="card-title">Datos - Dpto Santa Cruz</h3>
                @role('administrador')
                  <a href="javascript:void(0);">Ver Reporte</a>
                @endrole
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                </p>
              </div>
              <!-- /.d-flex -->
              <div class="position-relative mb-4">
                <canvas id="myChart" height="150"></canvas>
              </div>
              <div class="d-flex flex-row justify-content-end">               
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">CONFIRMADOS</span>
                <span class="info-box-number">
                  {{ @casos('confirmados') }}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">RECUPERADOS</span>
                <span class="info-box-number">{{ @casos('recuperados') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> 
          <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">SOSPECHOSOS</span>
                <span class="info-box-number">{{ @casos('sospechosos') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>
      
              <div class="info-box-content">
                <span class="info-box-text">DESESOS</span>
                <span class="info-box-number">{{ @casos('confirmados') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-12">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
      
              <div class="info-box-content">
                <span class="info-box-text">DESCARTADOS</span>
                <span class="info-box-number">{{ @casos('confirmados') }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
@endsection
@section('charts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js">
  </script>
  <script>
    
    var provincias  = @json(buscar_provincias(1));

    var confirmados = @json(@casos('confirmados'));
    var recuperados = @json(@casos('recuperados'));
    var sospechosos = @json(@casos('sospechosos'));
    var descartados = @json(@casos('descartados'));
    var desesos     = @json(@casos('desesos'));
    


    console.log(recuperados);
    console.log(confirmados);
    console.log(provincias);



    var ctx = document.getElementById('myChart').getContext('2d');
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
@endsection