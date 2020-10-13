<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Provincias</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Provincias</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('sistema.components.flash')
    <!-- /.row -->
    @if ($lista)
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header card-info">
                        @role('administrador')
                            @include('sistema.modules.provincias.create')
                        @endrole
                        <h3 class="card-title"></h3>
            
                        <div class="card-tools">
                            @include('sistema.modules.provincias.search')
                        </div>
                    </div>
                            <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Provincia</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($provincias as $provincia)
                                    <tr class="text-center" >
                                        <td>{{ $provincia->id }}</td>
                                        <td>{{ $provincia->nombre }}</td>
                                        <td class="text-center">
                                            @role('administrador')
                                                @include('sistema.modules.provincias.update')
                                                @include('sistema.modules.provincias.destroy')
                                            @endrole
                                            <button wire:click='mostrarInformacion({{ $provincia->id }})' type="button" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>                            
                                @endforeach    
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer">
                        {{ $provincias->render() }}
                    </div>
                </div>

            </div>
        </div>
    @else
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header card-info">
                    @role('administrador')
                        @include('sistema.modules.provincias.create')
                    @endrole
                    <h3 class="card-title"></h3>
                        
                        Historial de Datos Realizados a nivel Provincial
                    <div class="card-tools">
                        <button wire:click='ocultarInformacion()' class="btn btn-sm btn-info" >Hoy Dia</button>
                        {{-- <button class="btn btn-sm btn-info" >regresar</button>
                        <button class="btn btn-sm btn-info" >regresar</button>
                        <button class="btn btn-sm btn-info" >regresar</button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="border p-1 m-1 text-center">
                        <strong><p>{{ $provincia }}</p></strong>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3>{{ totalCasos($provincia_id,'confirmados') }}</h3>
                                <p>Casos</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('provincias.recuperados.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Confirmados  &nbsp;<i class="fas fa-file-pdf"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3>{{ totalCasos($provincia_id,'recuperados') }}</h3>
                                <p>Casos</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('provincias.recuperados.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Recuperados  &nbsp;<i class="fas fa-file-pdf"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-secondary">
                              <div class="inner">
                                <h3>{{ @totalCasos($provincia_id,'desesos') }}</h3>
                                <p>Casos</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('provincias.desesos.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Desesos  &nbsp;<i class="fas fa-file-pdf"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="small-box bg-warning">
                              <div class="inner">
                                <h3>{{ @totalCasos($provincia_id,'sospechosos') }}</h3>
                                <p>Casos</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="{{ route('provincias.sospechosos.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Sospechosos &nbsp;<i class="fas fa-file-pdf"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-6">
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3>{{ @totalCasos($provincia_id,'descartados') }}</h3>
                                <p>Casos</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              {{-- <a href="{{ route('provincias.descartados.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Descartados &nbsp;<i class="fas fa-file-pdf"></i></a> --}}
                              <a href="{{ route('provincias.descartados.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Descartados &nbsp;<i class="fas fa-file-pdf"></i></a>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <div class="card-footer">
                    <button wire:click='ocultarInformacion()' class="btn btn-sm btn-info" >Volver a la lista</button>
                   
                </div>
            </div>
        </div>
    </div>
    @endif
</div>