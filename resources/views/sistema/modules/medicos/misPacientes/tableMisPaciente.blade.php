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
                                            <a class="btn btn-sm btn-info" wire:click='formularioConsulta({{$item->paciente_id}})'>
                                            {{-- href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}" --}}
                                                <i class="fa fa-h-square"></i>&nbsp; Consulta
                                            </a>


                                            @if ($item->caso=='confirmados')
                                                <a class="btn btn-sm btn-success" >
                                                {{-- href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}" --}}
                                                    <i class="fa fa-eye"></i>&nbsp; Tratamiento
                                                </a>
                                            @endif

                                        </td>
                                    @else
                                        <td><span class="badge badge-success">No</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" wire:click='formularioConsulta({{$item->paciente_id}})'>
                                            {{-- href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}" --}}
                                                <i class="fa fa-h-square"></i>&nbsp; Consulta
                                            </button>
                                             <button class="btn btn-sm btn-warning" wire:click='formularioInternar({{$item->paciente_id}})'>
                                             {{-- href="{{ route('paciente.hospital', ['id'=>$item->paciente_id]) }}" --}}
                                                <i class="fa fa-hospital"></i>&nbsp; Internar
                                            </button>
                                            @if ($item->caso=='sospechosos')
                                                <a class="btn btn-sm btn-success" >
                                                {{-- href="{{ route('consulta.paciente.create', ['id'=>$item->paciente_id]) }}" --}}
                                                    <i class="fa fa-eye"></i>&nbsp; Tratamiento
                                                </a>
                                            @endif
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
    