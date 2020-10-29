<div class="row">
    <div class="col-12 text-center p-3">
        <label for="apellidos" class ="form-control">Paciente : {{ $paciente_nombre }} {{ $paciente_apellido }}</label> 
    </div> 
</div>
<div class="row">
    <div class="col-12">
    <div class="card card-info">
        <div class="card-header">
            {{-- @include('sistema.modules.pacientes.create') --}}
            {{-- <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a> --}}
            <h3 class="card-title"></h3>
    
            <div class="card-tools">

            </div>
        </div>

        @if ($listaSeguimientoPaciente)
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Tratamiento</th>
                                <th>Fecha</th>
                                <th>Dias</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (@tratamientosPaciente($paciente_id) as $tratamiento)
                            <tr>
                                <td>{{ @nombreTratamiento($tratamiento->id) }}</td>
                                <td>{{ $tratamiento->fecha }}</td>
                                <td>{{ $tratamiento->dias }}</td>
                                <td>
                                    @if ($tratamiento->estado)
                                        <span class="badge badge-success">Seguimiento</span>
                                    @else
                                        <span class="badge badge-danger">Finalizado</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($tratamiento->estado)
                                        <button wire:click='editarSeguimientoPaciente({{ $tratamiento->paciente_tratamiento_id}})' class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>&nbsp; Seguimiento 
                                        </button>
                                    @else
                                        <button wire:click='verSeguimientoPaciente({{ $tratamiento->paciente_tratamiento_id }})' class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i>&nbsp; Seguimiento</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
        @endif
        @if ($verSeguimiento)
            
        @endif
        @if ($actSeguimiento)
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th >Fecha</th>
                        <th >Evolucion Enfermedad</th>
                        <th >Estado</th>
                        <th >Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        @foreach (@seguimientos($seguimiento_id) as $seguimiento)
                            
                            <tr>
            
                                <td>{{ @fechaRegistro($seguimiento->registro_id) }}</td>
                                <td>{{ $seguimiento->evolucion_enfermedad }}</td>
                                <td>{{ $seguimiento->estado }}</td>
                                <td>
            
                {{-- Modal --}}
                    <button wire:click='editarSeguimiento({{ $seguimiento->id }})'
                    data-toggle="modal" data-target="#seguimiento" class="btn btn-sm btn-info btn-block">
                        Registrar seguimiento
                    </button>
            
                {{-- wire:click='accionCrear()' --}}
                <div wire:ignore.self class="modal fade" id="seguimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header alert-default-info">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Registre el seguimiento  
                                    </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
            
                                </div>
                                
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Estado </label>
                                        <input wire:model='estado_seguimiento' type="text" class="form-control form-control-sm">
                                    </div>
            
                                    <div class="form-group">
                                        <label for="">Evolucion de Enfermedad </label>
                                        <input wire:model='evolucion_enfermedad' type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click.prevent='actualizarSeguimiento()' class="btn btn-secondary" data-dismiss="modal">
                                        Actualizar 
                                    </button>
            
                                </div>
                        </div>
                    </div>
                </div>
                {{-- Fin Modal --}}
            
            
                                </td>
                            </tr>                                        
                        @endforeach
                    </tbody>
                </tbody>
            </table>
        @endif


        <div class="card-footer">
            {{-- <button wire:click='finalizarSeguimiento({{ $seguimiento_id }})' class="btn btn-success btn-sm">Finalizar Seguimiento</button> --}}
            <button wire:click='ocultarSeguimientoMedico()' class="btn btn-danger btn-sm">Volver a la lista</button>
        </div>
    </div>
    </div>
</div>
