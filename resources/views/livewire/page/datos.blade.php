<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box fadeInLeft">
                <div class="row">

                    <div class="col-6">
                        <label for="nombre">Nombre</label> 
                        <input type="text" wire:model='nombre' value="nombre"  id="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror" placeholder="Escriba el nombre del paciente">
                        @error('nombre')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                    </div>
    
                    <div class="col-6">
                        <label for="apellidos">Apellidos</label> 
                        <input type="text" wire:model='apellidos' value="nombre" id="apellidos" class="form-control form-control-sm @error('apellidos') is-invalid @enderror" placeholder="Escriba los apellidos del paciente">
                        @error('apellidos')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="apellidos">Carnet</label> 
                        <input type="text" name="ci" value="76767876" id="ci" class="form-control form-control-sm @error('ci') is-invalid @enderror" placeholder="escriba el CI del paciente">
                        @error('ci')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="numero_seguro">Nº de Seguro</label> 
                        <input type="numero_seguro" name="numero_seguro" value="76767876" id="numero_seguro" class="form-control form-control-sm @error('numero_seguro') is-invalid @enderror" placeholder="Escriba el numero del seguro del paciente">
                        @error('numero_seguro')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="">Telefono</label> 
                        <input name="telefono" id="telefono" value="76767876" type="text" class="form-control form-control-sm @error('telefono') is-invalid @enderror" placeholder="" >
                        @error('telefono')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                    </div>
                </div>
            </div>

            
        <button type="submit" class="btn btn-info btn--sm btn-block">Guardar Datos</button>

        </div>        
    </div>
    {{ $nombre }}
    {{ $apellidos }}
</div>
