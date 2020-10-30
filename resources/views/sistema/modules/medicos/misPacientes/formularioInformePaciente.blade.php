

    <div class="container-fluid">
        <div class="border p-2 text-center">
            {{ nombreCompletoPaciente($paciente_id)[0]->nombre }} {{ nombreCompletoPaciente($paciente_id)[0]->apellidos }}
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3></h3>
  
                  <p>Seguimiento</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" wire:click='informeSeguimientos()' class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><sup style="font-size: 20px"></sup></h3>
  
                  <p>Tratamiento</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" wire:click='informeTratamientos()' class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3></h3>
  
                  <p> Consultas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" wire:click='informeConsultas()' class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3></h3>
  
                  <p>Examenes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" wire:click='informeExamenes()' class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
    </div>



    <div class="card">
        @if ($informeTratamiento)
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="title">Lista de Tratamientos  
                    </h5>
                </div>
                <div class="card-body">
                    {{-- {{ @tratamientosPaciente($paciente_id) }} --}}
                    @if (@tratamientosPaciente($paciente_id)->count())
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th >Tratamiento</th>
                                        <th >Fecha Inicio</th>
                                        <th >Dias de Tratamiento</th>
                                        <th >Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach (@tratamientosPaciente($paciente_id) as $tratamiento)
                                            
                                            <tr>
                                                <td>{{ $tratamiento->nombre }}</td>
                                                <td>{{ $tratamiento->fecha }}</td>
                                                <td>{{ $tratamiento->dias }}</td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-sm btn-info" data-toggle="modal" 
                                                    data-target="#detalle-tratamiento{{ $tratamiento->tratamiento_id }}">
                                                        <i class="fas fa-info"></i>
                                                    </a>


                                                    <div id="detalle-tratamiento{{ $tratamiento->tratamiento_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header alert-default-info">
                                                                    <h5 class="modal-title" id="my-modal-title">Tratamiento</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            
                                                                <div class="modal-body">
                                                    
                                                                    <div class="card-body table-responsive p-0">
                                                                        @if (@tratamientosPaciente($paciente_id)->count())
                                                                            <table class="table table-hover text-nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Medicamento</th>
                                                                                        <th>Dosis</th>
                                                                                        <th>Indicacion</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach (@detalleTratamiento($tratamiento->tratamiento_id) as $detalle)
                                                                                    <tr>
                                                                                        <td>{{ $detalle->medicamento }}</td>
                                                                                        <td>{{ $detalle->cantidad }}</td>
                                                                                        <td>{{ $detalle->indicacion }}</td>
                                                                                    </tr>                            
                                                                                @endforeach    
                                                                                </tbody>
                                                                            </table>
                                                                        @else
                                                                            No existen datos ingresados en la tabla
                                                                        @endif    
                                                                        
                                                                    </div>
                                                    
                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-outline-info">Cerrar</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>


                                                </td>
                                            </tr> 
                                        @endforeach    
                                                                            
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="border text-center">
                            <h6 class="title">No se le realizo ningun tratamiento a este paciente</h5>
                        </div>
                    @endif

                </div>
            </div>
        @endif

        @if ($informeConsulta)
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="title">Lista de Consultas  
                    </h5>
                </div>
                <div class="card-body">
                    {{-- {{ @consultasPacient($paciente_id) }} --}}
                    @if (@consultasPacient($paciente_id)->count())
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th >Motivo</th>
                                        <th >Fecha Realizada</th>
                                        <th >FechaProgramada</th>
                                        <th >Hora Programada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach (@consultasPacient($paciente_id) as $consulta)
                                            <tr>
                                                <td>{{ $consulta->motivo_consulta }}</td>
                                                <td>{{ $consulta->fecha_realizada }}</td>
                                                <td>{{ $consulta->fecha_programada }}</td>
                                                <td>{{ $consulta->hora_programada }}</td>
                                            </tr> 
                                        @endforeach    
                                                                            
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                    @else 
                        <div class="border text-center">
                            <h6 class="title">No se le realizo ninguna consulta a este paciente</h5>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if ($informeSeguimiento)
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="title">Lista de Seguimiento  
                    </h5>
                </div>
                <div class="card-body">
                    {{-- {{ @seguimientosPaciente($paciente_id) }} --}}
                    @if (@seguimientosPaciente($paciente_id)->count())
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th >Etapa</th>
                                        <th >Fecha</th>
                                        <th >Dias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach (@seguimientosPaciente($paciente_id) as $seguimiento)
                                            <tr>
                                                <td>{{ $seguimiento->etapa }}</td>
                                                <td>{{ $seguimiento->fecha }}</td>
                                                <td>{{ $seguimiento->dias }}</td>
                                                <td>







                                                    <a href="#" type="button" class="btn btn-sm btn-info" data-toggle="modal" 
                                                    data-target="#detalle-seguimiento{{ $seguimiento->id }}">
                                                        <i class="fas fa-info"></i>
                                                    </a>


                                                    <div id="detalle-seguimiento{{ $seguimiento->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header alert-default-info">
                                                                    <h5 class="modal-title" id="my-modal-title">Seguimiento</h5>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            
                                                                <div class="modal-body">
                                                    
                                                                    <div class="card-body table-responsive p-0">
                                                                        @if (@registrosSeguimientos($seguimiento->id)->count())
                                                                            <table class="table table-hover text-nowrap">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Fecha</th>
                                                                                        <th>Estado</th>
                                                                                        <th>Evolucion Enfermedad</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach (@registrosSeguimientos($seguimiento->id) as $detalle)
                                                                                    <tr>
                                                                                        <td>{{ $detalle->fecha }}</td>
                                                                                        <td>{{ $detalle->estado }}</td>
                                                                                        <td>{{ $detalle->evolucion }}</td>
                                                                                    </tr>                            
                                                                                @endforeach    
                                                                                </tbody>
                                                                            </table>
                                                                        @else
                                                                            No existen datos ingresados en la tabla
                                                                        @endif    
                                                                        
                                                                    </div>
                                                    
                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-outline-info">Cerrar</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>





                                                </td>
                                            </tr> 
                                        @endforeach    
                                                                            
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="border text-center">
                            <h6 class="title">No se le realizo ningun seguimiento a este paciente</h5>
                        </div>
                    @endif

                </div>
            </div>
        @endif

        @if ($informeExamen)
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="title">Lista de Examenes  

                    </h5>
                </div>
                <div class="card-body">
                    {{-- {{ @examenesPaciente($paciente_id) }} --}}
                    @if (@examenesPaciente($paciente_id)->count())
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th >Tipo Examen</th>
                                        <th >Resultado</th>
                                        <th >Fecha Realizado</th>
                                        <th >Fecha Resultado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach (@examenesPaciente($paciente_id) as $examen)
                                            <tr>
                                                <td>{{ $examen->nombre }}</td>
                                                <td>{{ $examen->resultado }}</td>
                                                <td>{{ $examen->fecha_realizado }}</td>
                                                <td>{{ $examen->fecha_resultado }}</td>
                                            </tr> 
                                        @endforeach    
                                                                            
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="border text-center">
                            <h6 class="title">No se le realizo ningun examen a este paciente</h5>
                        </div>
                    @endif

                </div>
            </div>
        @endif
    </div>