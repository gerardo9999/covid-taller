<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Mis Consultas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Mis Consultas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
  
        @include('sistema.components.flash')
    <div class="row">
        <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"></h3>
        
                <div class="card-tools">
                    <div class="btn-group">
                        <form>
                            <div class="input-group-prepend">
                                <input  type="date" class="form-control" name="fecha" placeholder="Buscar..." wire:model='searchText'>
                                <button disabled  class="btn btn-info btn-sm" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                    <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th >Motivo</th>
                                <th >Fecha Registrada</th>
                                <th >Hora Programada</th>
                                <th >Fecha Programada</th>
                                <th >Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ @userIdAuth() }} --}}
                        @foreach ($consultas as $consulta)
                                
                                <tr>
    
                                    <td>{{ $consulta->motivo_consulta }} </td>
                                    <td>{{ $consulta->fecha_registrada }} </td>
                                    <td>{{ $consulta->hora_programada }} </td>
                                    <td>{{ $consulta->fecha_programada }} </td>
                                    @if ($consulta->estado_consulta==1)
                                    
                                    @endif
                                    @if($consulta->estado_consulta==2) 
                                        <td>
                                            <span class="badge badge-info">Finaiizada</span>
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('miConsulta.pdf', ['id'=>$consulta->consulta_id]) }}" type="button" class="btn btn-sm btn-primary">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>      
                                            
                                        </td> --}}
                                    @endif
                                    @if($consulta->estado_consulta==0) 
                                        <td>
                                            <span class="badge badge-danger">Cancelada</span>
                                        </td>

                                    @endif
                                    @if($consulta->estado_consulta==1) 
                                        <td>
                                            <span class="badge badge-success">En Espera</span>
                                        </td> 
                                       
                                    @endif
                                </tr>  
                        @endforeach    
                        </tbody>
                    </table>
            </div>
            <div class="card-footer">
                {{ $consultas->render() }}
            </div>
        </div>
        </div>
        
    </div>
</div>
