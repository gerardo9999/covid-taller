@role('medico')
<div class="row">
    <div class="col-12 text-center p-3">
        <label for="apellidos" class ="form-control">Paciente : {{ $paciente_nombre }} {{ $paciente_apellido }}</label> 
    </div> 
</div>
<div class="card card-success">
    
        <div class="card-header">
            <h3 class="card-title">
                {{-- {{$hospital}} --}}

            </h3>
        </div>
        <div class="card-body">
        
            <div class="row">
                
                <div class="form-group col-6">
                            {{ $tratamiento_id }}
                            <label class="col-md-3 form-control-label" for="text-input">Dias   </label>
                        <input type="number" wire:model='dias' class="form-control form-control-sm" placeholder="Cuantos dias seguira el tratamiento">                                        
                    @error('dias')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>   

                <div class="form-group col-6">
                    <label class="col-md-3 form-control-label" for="text-input">Tratamiento</label>

                    {{-- Modal --}}
                    @if ($tratamiento)
                        <div class="button-group">
                            <button  data-toggle="modal" data-target="#tratamiento" class="btn btn-sm btn-success btn-block">
                                <i class="fa fa-check"></i> {{ $tratamiento }}
                            </button>   
                        </div>
                    @else
                        <button wire:click='mostrarListaTratamientos()' 
                        data-toggle="modal" data-target="#tratamiento" class="btn btn-sm btn-info btn-block">
                            Seleccionar Tratamiento
                        </button>
                    @endif

                    {{-- wire:click='accionCrear()' --}}
                    <div wire:ignore.self class="modal fade" id="tratamiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header alert-default-info">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Seleccionar Tratamiento  
                                    </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>

                                </div>
                                
                                <div class="modal-body">
                                    
                                    <div class="card-body table-responsive p-0">
                                        @if (@tratamientos()->count())
                                            @if ($listaTratamientosModal)
                                               
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Medicamento</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach (@tratamientos() as $tratamiento)
                                                        <tr>
                                                            <td>{{ $tratamiento->id }}</td>
                                                            <td>{{ $tratamiento->nombre }}</td>
                                                            <td>
                                                                {{-- @include('sistema.modules.tratamientos.destroy') --}}
                                                                <button  wire:click='verDetalleTratamientoModal({{ $tratamiento->id }})' class="btn btn-sm btn-info">
                                                                    <i class="fa fa-eye"></i>&nbsp; Ver Tratamiento 
                                                                </button>
                                                                <button data-dismiss="modal" wire:click='seleccionarTratamiento({{ $tratamiento->id }})'  
                                                                    class="btn btn-sm btn-success">
                                                                    <i class="fa fa-check"></i>&nbsp; Agregar
                                                                </button>
                                                            </td>
                                                        </tr>                            
                                                    @endforeach    
                                                    </tbody>
                                                </table>
                                            @else











                                            <div class="border p-2 text-center">
                                                Tratamiento : {{ $tratamiento }}
                                            </div>

                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Medicamento</th>
                                                        <th>Dosis</th>
                                                        <th>Indicacion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach (@detalleTratamiento($tratamiento_id) as $detalle)
                                                    <tr>
                                                        <td>{{ $detalle->medicamento }}</td>
                                                        <td>{{ $detalle->cantidad }}</td>
                                                        <td>{{ $detalle->indicacion }}</td>
                                                    </tr>                            
                                                @endforeach    
                                                </tbody>
                                            </table>






















                                            @endif
                                            
                                        
                                        @else
                                            <div class="text-center">
                                                No sexiste ningun tratamiento agregado
                                            </div>
                                        @endif

                                </div>

                                    













                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click.prevent="cancelarSeleccionarTratamiento()" class="btn btn-secondary" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                    @if (!$listaTratamientosModal)
                                    
                                    <button type="button" wire:click.prevent="mostrarListaTratamientos()" 
                                    class="btn btn-secondary" >
                                        Lista Tratamientos</button>
                                    @endif

                                </div>
                        </div>
                        </div>
                    </div>



                    {{-- Fin Modal --}}

                    
                    {{-- @error('numero_cama')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror --}}
                </div>

            </div>

        

        </div>
       

    @if ($dias)
        <div class="card">
            <div class="card-header">
                @if ($dias == 1)
                    Seguimiento durante un dia
                @else
                    Seguimiento durante {{ $dias }} dias
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="border p-2 col-md-12 col-xl-12 col-sm-12">
                        Etapa  <input type="text" class="form-control" wire:model='etapa'>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th >Dia</th>
                                    <th >Fecha</th>
                                    <th >Evolucion Enfermedad</th>
                                    <th >Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @for ($i = 0; $i < $dias; $i++)
                                        
                                        <tr>
                                            <td>{{  $i + 1  }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                    @endfor                                        
                                                                           
                                </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    @endif

</div> 
{{-- <div class=" card card-success">
    <div id='calendar'></div>
</div> --}}

<div class="card-footer">
    <div class="card-footer">
        <button wire:click='guardarPacienteTratamiento()' type="button" class="btn btn-success btn-sm">
            <i class="fa fa-check"></i>&nbsp; Guardar Registro
        </button>
        <button wire:click='cancelarPacienteTratamiento()' class="btn btn-danger btn-sm">Cancelar Registro</button>
    </div>
</div>


@endrole