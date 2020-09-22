<div>
    {{-- {{ $fecha }}
    <input type="text" wire:model='fecha'> --}}
    @role('administrador')
        @if ($lista)
            Lista
            <div class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Consultas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Consultas</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
                @include('admin.components.flash')
            <div class="row">
                <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        {{-- @include('admin.modules.pacientes.create') --}}
                        <a class="btn btn-sm btn-info" href="{{ route('consulta.create') }}">Agregar Medico</a>
                        <h3 class="card-title"></h3>
                
                        <div class="card-tools">
                            {{-- @include('admin.modules.pacientes.search') --}}
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
                                        <th >Fecha Consulta</th>
                                        <th >Fecha Programada</th>
                                        <th >Estado</th>
                                        <th style="width:10%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($consultas as $consulta)
                                    <tr>
                                        <td>{{ $consulta->motivo_consulta }} </td>
                                        <td>{{ $consulta->fecha_registrada }} </td>
                                        <td>{{ $consulta->fecha_programada }} </td>
                                        @if ($consulta->estado_consulta)
                                        <td>
                                            <span class="badge badge-danger">En Espera</span>
                                            </td>   
                                        @else 
                                            <td>
                                                <span class="badge badge-danger">Finaiizada</span>
                                            </td>
                                        @endif
                                        <td>
                                            <button wire:click='mostrarPaciente({{ $consulta->paciente_id }})' type="button" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                        </td>
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
            <button class="btn btn-sm btn-danger" wire:click='mostrarPaciente()'>Paciente</button>
            <button class="btn btn-sm btn-danger" wire:click='mostrarMedico()'>Medico</button>
        @endif
        
        @if ($paciente)


            {{ @paciente($paciente_id) }}




            <button class="btn btn-sm btn-danger" wire:click='mostrarLista()'>Lista</button>
            <button class="btn btn-sm btn-danger" wire:click='mostrarMedico()'>Medico</button>
        @endif
        
        @if ($medico)
            Medico
            <button class="btn btn-sm btn-danger" wire:click='mostrarPaciente()'>Paciente</button>
            <button class="btn btn-sm btn-danger" wire:click='mostrarLista()'>Lista</button>
        @endif

    @endrole


    @role('medico')
        @if ($lista)
            
            <div class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Consultas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Consultas</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
                @include('admin.components.flash')
            <div class="row">
                <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        {{-- @include('admin.modules.pacientes.create') --}}
                        <a class="btn btn-sm btn-info" href="{{ route('consulta.create') }}">Agregar Consulta</a>
                        <h3 class="card-title"></h3>
                
                        <div class="card-tools">
                            {{-- @include('admin.modules.pacientes.search') --}}
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
                                        <th >Fecha Consulta</th>
                                        <th >Hora Programada</th>
                                        <th >Fecha Programada</th>
                                        <th >Estado</th>
                                        <th style="width:10%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ @userIdAuth() }} --}}
                                @foreach ($consultas as $consulta)
                                    @if ($consulta->medico_id == @userIdAuth())
                                        
                                        <tr>

                                            <td>{{ $consulta->motivo_consulta }} </td>
                                            <td>{{ $consulta->fecha_registrada }} </td>
                                            <td>{{ $consulta->hora_programada }} </td>
                                            <td>{{ $consulta->fecha_programada }} </td>
                                            @if ($consulta->estado_consulta==1)
                                            
                                            @endif
                                            @if($consulta->estado_consulta==2) 
                                                <td>
                                                    <span class="badge badge-success">Finaiizada</span>
                                                </td>
                                                <td>
                                                    <button wire:click='mostrarPaciente({{ $consulta->paciente_id }})' type="button" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    
                                                </td>
                                            @endif
                                            @if($consulta->estado_consulta==0) 
                                                <td>
                                                    <span class="badge badge-danger">Cancelada</span>
                                                </td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-sm btn-success">
                                                        <i class="fas fa-edit"></i>
                                                    </a> 
                                                </td>
                                            @endif
                                            @if($consulta->estado_consulta==1) 
                                                <td>
                                                    <span class="badge badge-info">En Espera</span>
                                                </td> 
                                                <td>
                                                    <a href="#" type="button" class="btn btn-sm btn-success">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" type="button" class="btn btn-sm btn-success">
                                                        <i class="fas fa-lock"></i>
                                                    </a> 
                                                    <a href="{{ route('consulta.pdf', ['id'=>$consulta->paciente_id]) }}" type="button" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>      
                                                </td> 
                                            @endif
                                           
                                           
                                        </tr>  
                                    @endif
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
            <button class="btn btn-sm btn-danger" wire:click='mostrarPaciente()'>Paciente</button>
            <button class="btn btn-sm btn-danger" wire:click='mostrarMedico()'>Medico</button>
        @endif
    @endrole


</div>

