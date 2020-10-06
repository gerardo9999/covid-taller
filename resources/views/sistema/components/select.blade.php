<div class="row">
    <div class="form-group col-4">
        <label for="departamento">Departamento</label>
        <select name="departamento_id" id="departamentos" class='mi-selector form-control form-control-sm'  >
            <option value="" >Seleccionar Departamento</option>
            @foreach (@departamentos() as $item)
            <option  value="{{ $item->id }}">{{ $item->nombre }}</option>
            @endforeach
        </select>
        @error('departamento_id')
            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
        @enderror
    </div>

    <div class="form-group col-4">
        <label for="provincia_id">Provincias</label>
        <select class="mi-selector form-control form-control-sm " name="provincia_id" id="provincias">
            <option value="" >Seleccione antes un Dpto</option>
            
        </select>
        @error('provincia_id')
        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
        @enderror
    </div>
    <div class="form-group col-4">
        <label for="municipio_id">Municipios</label>
        <select class="mi-selector form-control form-control-sm" name="municipio_id" id="municipios">
            <option value="" >Seleccione antes una Provincia</option>
            
        </select>
        @error('municipio_id')
            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
        @enderror
    </div>
</div>