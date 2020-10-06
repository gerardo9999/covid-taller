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
                <li class="nav-item"><a class="btn-sm btn-info nav-link active" href="#consultas" data-toggle="tab">Consultas</a></li>
                <li class="nav-item"><a class="btn-sm btn-info nav-link" href="#historial" data-toggle="tab">Historial Medico</a></li>
                <li class="nav-item"><a class="btn-sm btn-info nav-link" href="#examenes" data-toggle="tab">Examenes Medicos</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

               @include('sistema.modules.pacientes.consultas')
                <!-- /.tab-pane -->
               @include('sistema.modules.pacientes.historial')

                <div class="tab-pane" id="examenes">
                    <div class="card-body">
                        <table id="tabla1" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>Tipo Exmane</th>
                            <th>Resultado</th>
                            <th>Fecha</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach(@historial() as $historia)
                                @if($paciente_id == $historia->paciente_id)
                                <tr>

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