<div class="tab-pane" id="examenes">
    <div class="card-body">
        <table id="tabla1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Tipo Examen</th>

            <th>Resultado</th>
            
            <th>Fecha Realizado</th>
            <th>Fecha Resultados</th>
          </tr>
          </thead>
          <tbody>
              @foreach(@examenes($paciente_id) as $historia)
                <tr>
                    <td>{{ $historia->examen }}</td>
                    @if ($historia->resultado)
                        <td>{{ $historia->resultado }}</td>
                    @else
                        <td><span class="badge badge-info">No entregado</span></td>
                    @endif
                        <td>{{ $historia->fecha_examen }}</td>
                    @if ($historia->fecha_resultado)
                        <td>{{ $historia->fecha_resultado }}</td>
                    @else    
                        <td><span class="badge badge-info">No realizado</span></td>
                    @endif
                </tr>
              @endforeach
          </tbody>
        </table>
    </div>  

</div>