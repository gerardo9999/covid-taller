<div class="tab-pane" id="historial">
    <div class="card-body">
        <table id="tabla1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Enfermedad</th>
            <th>Alergia</th>
            <th>Peso</th>
            <th>Altura</th>
            <th>Fecha</th>
          </tr>
          </thead>
          <tbody>
              @foreach(@historial($paciente_id) as $historia)
                {{-- @if($paciente_id == $historia->paciente_id) --}}
                <tr>
                    <td>{{$historia->enfermedad}}</td>
                    <td>{{$historia->alergia}}</td>
                    <td>{{$historia->peso}} kgr</td>
                    <td>{{$historia->altura}} m</td>
                    <td>{{$historia->fecha_registro}}</td>
                </tr>
                {{-- @endif --}}
              @endforeach
          </tbody>
        </table>
    </div>  
</div>