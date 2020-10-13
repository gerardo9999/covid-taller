<div class="active tab-pane" id="consultas">
    <div class="card-body">
        <table id="tabla1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Motivo Consulta</th>
            <th>Fecha Programada</th>
            <th>Hora Programada</th>
            <th>Estado Consulta</th>
          </tr>
          </thead>
          <tbody>
              @foreach(@consultasPaciente($paciente_id) as $consulta)
                <tr class="text-center">
                    <td>{{$consulta->motivo_consulta}}</td>
                    <td>{{$consulta->fecha_programada}}</td>
                    <td>{{$consulta->hora_programada}}</td>
                    @if ($consulta->estado_consulta == 1)
                      <td>
                        <span class="badge badge-info">Espera</span>
                      </td>
                    @endif 
                    
                    @if ($consulta->estado_consulta == 2)
                      <td>
                        <span class="badge badge-success">Realizada</span>
                      </td>
                    @endif
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>  
</div>