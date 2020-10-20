<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Consultas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Consultas</li>
                </ol>
            </div>
        </div>
    </div>
</div>
    @include('sistema.components.flash')
<div class="card">
    <div class="border text-center p-2">
        Paciente : {{ @nombrePaciente($consulta_id) }}
    </div>
    <div class="card-body border">
        
        <button  wire:click='examenLista()' class="btn btn-sm btn-info">Examenes Medicos</button>
        <button  wire:click='diagnosticoLista()' class="btn btn-sm btn-info">Diagnostico Medico</button>
        <button  wire:click='prescripcionLista()' class="btn btn-sm btn-info">Prescripcion Medico</button>
        


        @if ($listaExamen)
            @if (@existeExamenMedico($consulta_id))
                @include('sistema.components.flash')
                <div class="card-body table-responsive p-0">
                    @if(session()->has('delete'))                
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="alert-icon">
                                <i class="far fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong></strong> {{ session('delete') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Fecha Realizado</th>
                                <th>Descripcion</th>
                                <th>Examen</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (@examenMedico($consulta_id) as $item)
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
                                                            <button type="button" wire:click='eliminarExamenMedico({{ $item->examen_id }})' class="btn btn-danger" data-dismiss="modal" aria-label="Close">Borrar</button>
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
                    <button type="button" wire:click='examenFormulario()' class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp; Agregar Examen Medico  </button>
                </div>
            @else
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="title">
                            No Existe Ningun Examen Realizado
                        </h5>
                    </div>
                    <div class="card-body">
                        <button wire:click='examenFormulario()' class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp; Agregar Examen Medico  </button>
                    </div>
                </div>
            @endif
        @endif
        @if ($formularioExamen)
            <div class="card">
                <div class="card-header">
                    <div class="title">Examenes Medicos</div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <select class="form-control" wire:model='tipoExamen'>
                            <option >Seleccione un examen medico</option>                                                        
                            @foreach (@tipo_examen() as $item)
                                <option>{{ $item->nombre }} </option>                                                        
                            @endforeach
                        </select>
                        @error('tipoExamen')
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
                        <button type="button" wire:click='guardarExamenMedico()' class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp; Guardar Examen</button>
                    </div>
                </div>
            </div>
        @endif

        @if ($listaDiagnostico)
            @if (existeDiagnostico($consulta_id))
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (@diagnosticoConsulta($consulta_id) as $item)
                                <tr>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" wire:click='diagnosticoFormularioActualizar({{ $item->id }})'><i class="fas fa-edit"></i></button>
                                        <a href="{{ route('diagnostico.pdf', ['id'=>$item->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="title">
                            No Existe Diagnostico Realizado
                        </h5>
                    </div>
                    <div class="card-body">
                        <button wire:click='diagnosticoFormulario()' class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp; Agregar Diagnostico Medico  </button>
                    </div>
                </div>                    
            @endif
        @endif
        @if ($formularioDiagnostico)
            <div class="card">
                <div class="card-header">
                    @if ($formularioDiagnosicoActualizar)
                        <div class="title">Modificar Diagnostico Medico</div>
                    @else
                        <div class="title">Diagnostico Medico</div>
                    @endif

                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label for="descripcion">Descripcion </label>
                            <textarea wire:model="descripcion_medica" class="form-control @error('descripcion') is-invalid  @enderror" row="10", col="10" placeholder="Escribe una descripcion del diagnostico" >

                            </textarea>
                            @error('descripcion_medica')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
                        

                        <div class="border">
                            @if ($formularioDiagnosicoActualizar)
                                <button type="button" wire:click='actualizarDiagnosticoMedico()' class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>&nbsp; Modificar diagnostico
                                </button>
                            @else
                                <button type="button" wire:click='guardarDiagnosticoMedico()' class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>&nbsp;  Guardar diagnostico
                                </button>
                            @endif

                        </div>
                </div>
            </div> 
        @endif

        @if ($listaPrescripcion)
            @if (existePrescripcion($consulta_id))
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
                            @foreach (@prescripcionConsulta($consulta_id) as $item)
                                <tr>
                                    <td>{{ $item->medicamento }}</td>
                                    <td>{{ $item->cantidad_producto }}</td>
                                    <td>{{ $item->indicaciones }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success" wire:click='prescripcionFormularioActualizar({{ $item->id}})'>
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" wire:click='eliminarPrescripcionMedica({{ $item->id}})'>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" wire:click='prescripcionFormulario()' class="btn btn-sm btn-success">
                    <i class="fas fa-plus"></i>&nbsp; Agregar Prescripcion  
                </button>
                <a href="{{ route('prescripcion.pdf', ['id'=>$consulta_id]) }}" class="btn btn-sm btn-info">
                    <i class="fas fa-file-pdf"></i>&nbsp;  Prescripciones Medicas
                </a>

            @else
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="title">
                            No Existe Prescripcion Medica
                        </h5>
                    </div>
                    <div class="card-body">
                        <button wire:click='prescripcionFormulario()' class="btn btn-sm btn-success"><i class="fas fa-plus">
                            </i>&nbsp; Agregar Prescripcion Medica  
                        </button>
                    </div>
                </div>    
            @endif
        @endif
        @if ($formularioPrescripcion)
            <div class="card">
                <div class="card-header">
                    @if ($formularioPrescripcionActualizar)
                        <div class="title">Modificar Prescripcion Medica</div>
                        
                    @else                    
                        <div class="title">Prescripcion Medica</div>
                    @endif

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
                            @if ($formularioPrescripcionActualizar)
                                <button type="button" wire:click='actualizarPrescripcionMedico()' class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>&nbsp;     Modificar prescripcion
                                </button>
                            @else
                                <button type="button" wire:click='guardarPrescripcionMedica()' class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>&nbsp;     Guardar prescripcion
                                </button>
                            @endif
                        </div>
                </div>
            </div>
        @endif

    



    </div>
</div>
<div class="card-body">
    <button type="button" wire:click='finalizarConsultaMedica()' class="btn btn-sm btn-success">Finalizar Consulta Medica</button>
</div>