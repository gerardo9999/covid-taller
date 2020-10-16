<div class="tab-pane" id="historial">
    <div class="card-body">
        <table id="tabla1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Enfermedad</th>
            <th>Fecha</th>
          </tr>
          </thead>
          <tbody>
              @foreach(@historiales($paciente_id) as $historia)
                <tr>
                    <td>{{$historia->enfermedad}}</td>
                    <td>{{$historia->fecha_registro}}</td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </div>  
</div>