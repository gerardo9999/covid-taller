@role('medico')
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            {{-- {{$hospital}} --}}

        </h3>
    </div>
    <div class="card-body">
      
        <div class="row">
            
            <div class="form-group col-6">
                <label class="col-md-3 form-control-label" for="text-input">Dias   </label>
                    <input type="text" wire:model='dias' class="form-control" placeholder="Cuantos dias seguira el tratamiento">                                        
                @error('dias')
                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                @enderror
            </div>   

            <div class="form-group col-6">
                <label class="col-md-3 form-control-label" for="text-input">Tratamiento</label>

                {{-- Modal --}}
                <button  data-toggle="modal" data-target="#tratamiento" class="btn btn-sm btn-info btn-block">Medicamentos</button>
                {{-- wire:click='accionCrear()' --}}
                <div wire:ignore.self class="modal fade" id="tratamiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                       <div class="modal-content">
                            <div class="modal-header alert-default-info">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Seleccionar Tratamientos
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                


                                













                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
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