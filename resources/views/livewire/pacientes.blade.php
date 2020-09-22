<div>
    @if ($lista)
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pacientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pacientes</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @include('admin.components.flash')
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    {{-- @include('admin.modules.pacientes.create') --}}
                    <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a>
                    <h3 class="card-title"></h3>
            
                    <div class="card-tools">
                        @include('admin.modules.pacientes.search')
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th >Paciente</th>
                                    <th style="width:10%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>
                                        <a href="#" style="text-decoration: none">
                                            <img data-toggle="modal" src="{{ asset($paciente->avatar) }}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar">
                                        </a>
                                        <strong>{{ $paciente->nombre }} {{ $paciente->apellidos }}</strong>
                                    </td>
                                        {{-- @include('admin.modules.pacientes.imagen') --}}
                                    <td>
                                        <a href="{{ route('paciente.edit', ['id'=> $paciente->id]) }}" type="button" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button wire:click='mostrarPerfil({{ $paciente->id }})' type="button" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @include('admin.modules.pacientes.destroy') 
                                    </td>
                                </tr>                            
                            @endforeach    
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">
                    {{ $pacientes->render() }}
                </div>
            </div>
            </div>
            
        </div>
    @endif
    @if ($perfil)
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Paciente</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
          
              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
          
                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset(@paciente($paciente_id)[0]->avatar) }}"
                                 alt="User profile picture">
                          </div>
                          <h3 class="profile-username text-center">{{ @paciente($paciente_id)[0]->nombre }} {{ @paciente($paciente_id)[0]->apellidos }}</h3>
          
                          <p class="text-muted text-center"></p>
          
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Cedula Identidad</b> <a class="float-right">{{ @paciente($paciente_id)[0]->ci }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Seguro Medico</b> <a class="float-right">{{ @paciente($paciente_id)[0]->numero_seguro }}</a>
                            </li>
                          </ul>
          
                          {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
          
                      <!-- About Me Box -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Direccion</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <hr>
          
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Departamento</strong>
                            <p class="text-muted">{{ @direccionPaciente($paciente_id)[0]->departamento }}</p>
                          <hr>
                          <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Provincia</strong>
                            <p class="text-muted">{{ @direccionPaciente($paciente_id)[0]->provincia }}</p>
                          <hr>

                          <hr>
                          <strong><i class="fas fa-map-marker-alt mr-1"></i> Municipio</strong>
                          <p class="text-muted">{{ @direccionPaciente($paciente_id)[0]->municipio }}</p>
                        <hr>
                         
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                      <div class="card">
                        <div class="card-header p-2">
                          <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Consultas</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Historial Medico</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">

                            <div class="active tab-pane" id="activity">
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
                                                @if ($consulta->estado_consulta == 0)
                                                    <span class="badge badge-danger">Espera</span>
                                                @endif
                                                @if ($consulta->estado_consulta == 2)
                                                <span class="badge badge-success">Realizada</span>
                                            @endif
                                            </tr>
                                          @endforeach
                                          {{-- $table->integer('estado_consulta')->default(1);
                                          // $table->string('evolucion_enfermedad');
                                          $table->string('motivo_consulta');
                              
                                          $table->date('fecha_consulta');
                                          $table->date('fecha_programada');
                              
                                          // $table->integer('historial_id')->unsigned();
                                          $table->integer('paciente_id')->unsigned(); --}}
                                      </tbody>
                                    </table>
                                  </div>  
                              <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
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
                                          @foreach(@historial() as $historia)
                                            @if($paciente_id == $historia->paciente_id)
                                            <tr>
                                                <td>{{$historia->enfermedad}}</td>
                                                <td>{{$historia->alergia}}</td>
                                                <td>{{$historia->peso}} kgr</td>
                                                <td>{{$historia->altura}} m</td>
                                                <td>{{$historia->fecha_registro}}</td>
                                            </tr>
                                            @endif
                                          @endforeach
                                      </tbody>
                                    </table>
                                </div>  
                            </div>
                          </div>
                        </div><!-- /.card-body -->
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                </div><!-- /.container-fluid -->
              </section>

        
    @endif


</div>
