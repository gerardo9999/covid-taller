<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Municipios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('provincia.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Municipios</li>
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
                    <div class="card-header">
                        @role('administrador')
                            @include('sistema.modules.municipios.create')
                        @endrole
                        <h3 class="card-title"></h3>
          
                        <div class="card-tools">
                            @include('sistema.modules.municipios.search')
                        </div>
                    </div>   
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Municipio</th>
                                    <th>Provincia</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($municipios as $municipio)
                                <tr class="text-center">                                   
                                    <td>{{ $municipio->id }}</td>
                                    <td>{{ $municipio->municipio }}</td>
                                    <td>{{ $municipio->provincia }}</td>
                                    <td class="text-center">
                                        @role('administrador')
                                            @include('sistema.modules.municipios.update')
                                            @include('sistema.modules.municipios.destroy')
                                        @endrole
                                        <button wire:click='mostrarInformacion({{ $municipio->id }})' type="button" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>                            
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $municipios->render() }}
                    </div>                  
                </div>                
            </div>
        </div>
    @else 
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header card-info">
                       
                        <h3 class="card-title"></h3>                                 
                        Historial de Datos Realizados a nivel Municipal
                        <div class="card-tools">
                            <button wire:click='ocultarInformacion()' class="btn btn-sm btn-info" >Hoy Dia</button>
                            {{-- <button class="btn btn-sm btn-info" >regresar</button>
                            <button class="btn btn-sm btn-info" >regresar</button>
                            <button class="btn btn-sm btn-info" >regresar</button> --}}
                        </div> 
                    </div>
                    <div class="card-body">
                        <div class="border p-1 m-1 text-center">
                            <strong><p>{{ $municipio }}</p></strong>
                        </div>
                        <div class="row">                       
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                            <h3>{{ totalCasos($municipio_id,'confirmados') }}</h3>
                                            <p>Casos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('municipios.confirmados.pdf', ['id'=>$municipio_id]) }}" class="small-box-footer">Confirmados  &nbsp;<i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ totalCasos($municipio_id,'recuperados') }}</h3>
                                        <p>Casos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('municipios.recuperados.pdf', ['id'=>$municipio_id]) }}" class="small-box-footer">Recuperados  &nbsp;<i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3>{{ @totalCasos($municipio_id,'desesos') }}</h3>
                                        <p>Casos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('municipios.desesos.pdf', ['id'=>$municipio_id]) }}" class="small-box-footer">Desesos  &nbsp;<i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ @totalCasos($municipio_id,'sospechosos') }}</h3>
                                        <p>Casos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('municipios.sospechosos.pdf', ['id'=>$municipio_id]) }}" class="small-box-footer">Sospechosos &nbsp;<i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ @totalCasos($municipio_id,'descartados') }}</h3>
                                        <p>Casos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    {{-- <a href="{{ route('provincias.descartados.pdf', ['id'=>$provincia_id]) }}" class="small-box-footer">Descartados &nbsp;<i class="fas fa-file-pdf"></i></a> --}}
                                    <a href="{{ route('municipios.descartados.pdf', ['id'=>$municipio_id]) }}" class="small-box-footer">Descartados &nbsp;<i class="fas fa-file-pdf"></i></a>
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



