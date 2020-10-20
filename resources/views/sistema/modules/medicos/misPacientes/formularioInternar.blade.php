        @role('medico')
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{$hospital}}
                        </h3>
                    </div>
                    <div class="card-body">
                      
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-md-3 form-control-label" for="text-input">Sala  </label>
                                    <input type="text" wire:model='numero_sala' class="form-control" placeholder="Cual es el numero de la sala">                                        
                                @error('numero_sala')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                            </div>   
                            <div class="form-group col-6">
                                <label class="col-md-3 form-control-label" for="text-input">Cama</label>
                                    <input type="text" wire:model='numero_cama' class="form-control" placeholder="Cual es el numero de la cama">                                        
                                @error('numero_cama')
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
                        <button wire:click='guardarPacienteInternado()' type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i>&nbsp; Guardar Registro
                        </button>
                        <button wire:click='cancelarPacienteInternado()' class="btn btn-danger btn-sm">Cancelar Registro</button>
                    </div>
                </div>

        @endrole