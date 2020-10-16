<div>
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
    @include('sistema.components.flash')
    <div class="row">
        <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                {{-- @include('sistema.modules.pacientes.create') --}}
                {{-- <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a> --}}
                <h3 class="card-title"></h3>
        
                <div class="card-tools">
                    @include('sistema.modules.pacientes.search')
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th >Paciente</th>
                            <th >Caso</th>
                            <th >Internado</th>
                            <th style="width:10%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            @foreach ($pacientes as $item)
                            <tr>
                                
                                <td>{{ $item->nombre }} {{ $item->apellidos }}</td>
                                
                                
                                @if ($item->caso=='sospechosos')
                                    <td><span class="badge badge-warning">Sospechoso</span></td>
                                @endif
                                @if ($item->caso=='confirmados')
                                    <td><span class="badge badge-danger">Confirmado</span></td>
                                @endif
                                @if ($item->caso=='recuperados')
                                    <td><span class="badge badge-success">Recuperado</span></td>
                                @endif
                                @if ($item->caso=='desesos')
                                    <td><span class="badge badge-secondary">Deseso</span></td>
                                @endif
                                @if ($item->caso=='descartados')
                                    <td><span class="badge badge-secondary">Descartado</span></td>
                                @endif


                                    @if ($item->internado)
                                        <td><span class="badge badge-danger">Si</span></td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}">
                                                <i class="fa fa-h-square"></i>
                                            </a>
                                            <a class="btn btn-sm btn-success" href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td><span class="badge badge-success">No</span></td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}">
                                                <i class="fa fa-h-square"></i>
                                            
                                            </a> 
                                             <a class="btn btn-sm btn-danger" href="{{ route('paciente.hospital', ['id'=>$item->paciente_id]) }}">
                                                <i class="fa fa-hospital"></i>
                                            </a>
                                            <a class="btn btn-sm btn-success" href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            {{-- {{ @misConsultas()->render() }} --}}
            </div>
        </div>
        </div>
        
    </div>
</div>
