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
    @include('sistema.components.flash')
<div class="card">
    <div class="border">
        Paciente : {{ @nombrePaciente($consulta) }}
    </div>
    <div class="card-body border">
        <button  wire:click='mostrarFormularioInformacion({{$consulta}})' class="btn btn-sm btn-info">Registrar Examenes Medicos</button>
        <button  wire:click='mostrarFormularioDiagnostico({{$consulta}})' class="btn btn-sm btn-info">Realizar Diagnostico Medico</button>
        <button  wire:click='mostrarFormularioPrescripcionExiste({{$consulta}})' class="btn btn-sm btn-info">Realizar Prescripcion Medico</button>
        
        <div class="card">
            <div class="card-body">
                @if ($informacionConsulta)

                    @if ($listaExamenes)
                        @include('sistema.components.flash')
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripcion</th>
                                        <th>Examen</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@examenMedico($consulta) as $item)
                                        <tr>
                                            <td>{{ $item->fecha_realizado }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>{{ $item->tipo_examen }}</td>
                                            <td>
                                                <a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-examen{{ $item->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <div id="destroy-examen{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                    <div class="modal-dialog modal-danger" role="document">
                                                        <div class="modal-content  modal-danger">
                                                            <div class="modal-header modal-danger">
                                                                <h5 class="modal-title" id="my-modal-title">Eliminar Examen Medico</h5>
                                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                                <div class="modal-body">
                                                                    <p>Seguro que desea eliminar el Examen?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="eliminarExamenMedico({{ $item->id }})" class="btn btn-danger">Borrar</button>
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <button type="button" wire:click='mostrarFormularioExamenes()' class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp; Agregar Examen Medico  </button>
                            @if (existePrescripcion($consulta))
                                <a href="{{ route('prescripcion.pdf', ['id'=>$consulta]) }}" class="btn btn-sm btn-info"><i class="fas fa-file-pdf"></i>&nbsp Prescripciones </a>
                            @endif    
                        
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header">
                                <div class="title">Examenes Medicos</div>
                            </div>
                            <div class="card-body">

                                    <div class="form-group row">
                                        {{ @nombreExamen($tipoExamen) }}
                                        <select class="form-control" wire:model='tipoExamen'>
                                                <option disabled >Seleccione un examen medico</option>                                                        
                                            
                                            @foreach (@tipo_examen() as $item)

                                                <option wire:click='setTipoExamen({{ $item->id }})' >{{ $item->id }} </option>                                                        
                                            @endforeach
                                        </select>
                                        @error('medicamento')
                                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                        @enderror
                                    </div>

                                   
                                    
                                    <div class="form-group row">
                                        <label for="indicaciones">Descripcion Examen </label>
                                        <textarea wire:model="descripcion_examen" class="form-control @error('indicaciones') is-invalid  @enderror" row="10", col="10" placeholder="Escribe una indicacion medica" >

                                        </textarea>
                                        @error('descripcion_examen')
                                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                        @enderror
                                    </div>
                                    <div class="border">
                                        @if ($actualizarPrescripcion)
                                            {{-- <button type="button" wire:click='actualizarPrescripcionMedica()' class="btn btn-sm btn-success">Actualizar prescripcion</button> --}}
                                            {{-- <button type="button" wire:click='mostrarlistaPrescripcion()' class="btn btn-sm btn-danger">Cancelar prescripcion</button> --}}
                                        @else
                                            <button type="button" wire:click='guardarExamenMedico()' class="btn btn-sm btn-success">Guardar Examen</button>
                                            {{-- <button type="button" wire:click='mostrarlistaPrescripcion()' class="btn btn-sm btn-danger">Cancelar prescripcion</button> --}}
                                        @endif
                                        
                                    
                                    </div>
                            </div>
                        </div>
                    @endif
                @endif
                @if ($diagnicosMedico)
                
                    {{-- Existe un diagnostico  --}}
                    @if (existeDiagnostico($consulta))

                        {{-- actualizar diagnostico medico --}}
                        @if ($actualizarDiagnosico)
                            <div class="card">
                                <div class="card-header">
                                    <div class="title">Actualizar Diagnostico Medico</div>
                                </div>
                                <div class="card-body">
                                        <div class="form-group row">
                                            <label for="descripcion">Descripcion  </label>
                                            <textarea wire:model="descripcion_medica" class="form-control @error('descripcion') is-invalid  @enderror" row="10", col="10" placeholder="Escribe una descripcion del diagnostico" >

                                            </textarea>
                                            @error('descripcion')
                                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="evolucion_enfermedad">Evolucion Enfermedad </label>
                                            <input wire:model="evolucion_enfermedad" type="text" id="evolucion_enfermedad"  class="form-control form-control-sm @error('evolucion_enfermedad') is-invalid @enderror" placeholder="Escribe la evolucion de la enfermedad">
                                        </div>
                                        <div class="border">
                                            <button type="button" wire:click='actualizarDiagnosticoMedico()' class="btn btn-sm btn-success">Guardar diagnostico</button>
                                            <button type="button" wire:click=mostrarlistaDiagnostico() class="btn btn-sm btn-danger">Cancelar diagnostico</button>
                                        </div>
                                </div>
                            </div> 
                        @else
                            {{-- <div class="alert alert-default-info">Diagnostico Realizado</div>     --}}
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Descripcion</th>
                                            <th>Evolucion</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (@diagnosticoConsulta($consulta) as $item)
                                            <tr>
                                                <td>{{ $item->descripcion }}</td>
                                                <td>{{ $item->evolucion_enfermedad }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger" wire:click='mostrarEditarDiagnostico({{  $item->id }})'><i class="fas fa-edit"></i></button>
                                                    <a href="{{ route('diagnostico.pdf', ['id'=>$item->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-file-pdf"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif


                    {{-- No existe un diagnostico --}}
                    @else
                        {{-- <div class="alert alert-default-danger">No existe un diagnostico realizado</div>   --}}
                        <div class="card">
                            <div class="card-header">
                                <div class="title">Diagnostico Medico</div>
                            </div>
                            <div class="card-body">
                                    <div class="form-group row">
                                        <label for="descripcion">Descripcion </label>
                                        <textarea wire:model="descripcion_medica" class="form-control @error('descripcion') is-invalid  @enderror" row="10", col="10" placeholder="Escribe una descripcion del diagnostico" >

                                        </textarea>
                                        @error('descripcion')
                                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="evolucion_enfermedad">Evolucion Enfermedad </label>
                                        <input wire:model="evolucion_enfermedad" type="text" id="evolucion_enfermedad"  class="form-control form-control-sm @error('evolucion_enfermedad') is-invalid @enderror" placeholder="Escribe la evolucion de la enfermedad">
                                    </div>
                                    <div class="border">
                                        <button type="button" wire:click='guardarDiagnosticoMedico()' class="btn btn-sm btn-success">Guardar diagnostico</button>
                                    </div>
                            </div>
                        </div> 
                    @endif

                @endif
                @if ($prescripcion)
                    {{-- $listaPrescripcion) --}}

                    @if ($listaPrescripcion)
                        @include('sistema.components.flash')
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Medicamento</th>
                                        <th>Dosis Medicamento</th>
                                        <th>Indicaciones</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@prescripcionConsulta($consulta) as $item)
                                        <tr>
                                            <td>{{ $item->medicamento }}</td>
                                            <td>{{ $item->cantidad_producto }}</td>
                                            <td>{{ $item->indicaciones }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-success" wire:click='mostrarEditarPrescripcion({{  $item->id }})'><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <button type="button" wire:click='mostrarFormularioPrescripcion()' class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp; Agregar Prescripcion  </button>
                            @if (existePrescripcion($consulta))
                                <a href="{{ route('prescripcion.pdf', ['id'=>$consulta]) }}" class="btn btn-sm btn-info"><i class="fas fa-file-pdf"></i>&nbsp Prescripciones </a>
                            @endif    
                        
                        </div>
                    @else
                        <div class="card">
                            <div class="card-header">
                                <div class="title">Prescripcion Medica</div>
                            </div>
                            <div class="card-body">

                                    <div class="form-group row">
                                        <label for="medicamento">Medicamento</label>
                                        <input wire:model="medicamento" class="form-control @error('medicamento') is-invalid  @enderror">
                                        @error('medicamento')
                                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="cantidad_producto">Dosis</label>
                                        <input wire:model="cantidad_producto" class="form-control @error('cantidad_producto') is-invalid  @enderror">
                                        @error('cantidad_producto')
                                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="indicaciones">Indicaciones medicas </label>
                                        <textarea wire:model="indicaciones" class="form-control @error('indicaciones') is-invalid  @enderror" row="10", col="10" placeholder="Escribe una indicacion medica" >

                                        </textarea>
                                        @error('indicaciones')
                                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                        @enderror
                                    </div>
                                    <div class="border">
                                        @if ($actualizarPrescripcion)
                                            <button type="button" wire:click='actualizarPrescripcionMedica()' class="btn btn-sm btn-success">Actualizar prescripcion</button>
                                            <button type="button" wire:click='mostrarlistaPrescripcion()' class="btn btn-sm btn-danger">Cancelar prescripcion</button>
                                        @else
                                            <button type="button" wire:click='guardarPrescripcionMedica()' class="btn btn-sm btn-success">Guardar prescripcion</button>
                                            {{-- <button type="button" wire:click='mostrarlistaPrescripcion()' class="btn btn-sm btn-danger">Cancelar prescripcion</button> --}}
                                        @endif
                                        
                                    
                                    </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <button type="button" wire:click='finalizarConsultaMedica({{ $consulta }})' class="btn btn-sm btn-success">Finalizar Consulta Medica</button>
</div>