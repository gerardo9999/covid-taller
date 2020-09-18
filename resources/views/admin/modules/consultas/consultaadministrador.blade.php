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
            <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a>
            <h3 class="card-title"></h3>
    
            <div class="card-tools">
                {{-- @include('admin.modules.pacientes.search') --}}
            </div>
        </div>
                <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th >Fase</th>
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
                            <td>{{ $consulta->evolucion_enfermedad }} </td>
                            <td>{{ $consulta->motivo_consulta }} </td>
                            <td>{{ $consulta->fecha_consulta }} </td>
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
                        </tr>                            
                    @endforeach    
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            {{-- {{ $pacientes->render() }} --}}
        </div>
    </div>
    </div>
    
</div>