@extends('welcome')
@section('contenido')
<br>
<br>
<br>
<br>
<br>

<section id="more-features" class="section-bg">
    <div class="container">
        <div class="row"> 

            <div class="col-lg-12">
                <div class="box wow fadeInLeft">        
                    <h4 class="title"><a href=""></a></h4> 
                    <div class="position-relative mb-4">
                        <canvas id="chartActual" height="100"></canvas>
                    </div>  
                </div>
            </div>

            <div class="col-lg-12">
                <div class="box wow fadeInLeft">        
                    <h4 class="title"><a href=""></a></h4> 
                    <div class="position-relative mb-4">
                        <canvas id="charTotal" height="100"></canvas>
                    </div>  
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('charts')
  <script src="{{ asset('chart/Chart.min.js') }}" >
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" ></script>


  <script>
    var confirmado = @json(dashboardactual('confirmados'));
    var recuperado = @json(dashboardactual('recuperados'));
    var deceso = @json(dashboardactual('desesos'));

    var ctx = document.getElementById('chartActual').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Confirmados', 'Recuperados', 'Decesos'],
            datasets: [{
                label: '# de Casos',
                data: [confirmado, recuperado, deceso],
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

   <script>
    var confirmado = @json(dashboardtotal('confirmados'));
    var recuperado = @json(dashboardtotal('recuperados'));
    var deceso = @json(dashboardtotal('desesos'));
    var ctx = document.getElementById('charTotal').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Confirmados', 'Recuperados', 'Decesos'],
            datasets: [{
                label: '# de Casos',
                data: [confirmado, recuperado, deceso],
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