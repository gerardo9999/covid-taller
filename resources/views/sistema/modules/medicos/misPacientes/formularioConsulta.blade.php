        @role('medico')
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            Medico : {{$medico_nombre}} {{$medico_apellido}} <br>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center p-3">
                                <label for="apellidos" class ="form-control">Paciente : {{ $paciente_nombre }} {{ $paciente_apellido }}</label> 
                            </div> 
                        </div>
                        <div class="row">

                        
                            <div class="form-group col-6">
                                <label for="">Hora Programada : {{ $hora_programada }}</label>
                                
                                    <input type="time" wire:model="hora_programada" class="form-control" placeholder="Hora de Reserva">                                        
                                @error('hora_programada')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                            </div>    
                            
                            <div class="form-group col-6">
                                <label for="">Fecha Programada  {{$fecha_programada}}</label>
                                
                                <label class="col-md-3 form-control-label" for="text-input">Hora</label>
                                    <input type="date" wire:model="fecha_programada" class="form-control" placeholder="Hora de Reserva">                                        
                                @error('fecha_programada')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                            </div>                      
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="apellidos">Motivo Consulta {{$motivo_consulta}}</label> 
                                <input type="text" wire:model="motivo_consulta" id="motivo_consulta" class="form-control form-control-sm @error('motivo_consulta') is-invalid @enderror" placeholder="Escriba motivo de la consulta">
                                @error('motivo_consulta')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div> 
                {{-- <div class=" card card-success">
                    <div id='calendar'></div>
                </div> --}}
                <div class="card">
                    <div class="card-footer">
                        <button wire:click='guardarConsulta()' type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i>&nbsp; Guardar Registro
                        </button>
                        <button wire:click='cancelarConsulta()' class="btn btn-danger btn-sm">Cancelar Registro</button>
                    </div>
                </div>

        @endrole