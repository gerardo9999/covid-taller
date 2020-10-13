<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1 class="m-0 text-dark">{{ $hospital->nombre }}</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Mis Pacientes</li>
                <li class="breadcrumb-item active">Internar</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    {{-- {{ $paciente_id }} --}}
    <div class="card card-info">
        <div class="card-header">
            {{-- @include('sistema.modules.pacientes.create') --}}
            {{-- <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a> --}}
            <h3 class="card-title">
                Internar Paciente {{ $ejemplo }}
            </h3>
    
            <div class="card-tools">
                {{-- @include('sistema.modules.pacientes.search') --}}
                @php
                    $paciente = $paciente_id
                @endphp
            </div>
        </div>
        <div class="card-body">
           <div class="border p-4">
                {{-- <strong>Paciente : </strong> {{ $pacientePersona->nombre }} {{ $pacientePersona->apellidos }} --}}
           </div>
           <div class="card-body">
            <div class="row">
                <div class="form-group col-6">
                    <label class="col-md-3 form-control-label" for="text-input">Sala</label>
                        <input type="text" name="numero_sala" class="form-control" placeholder="Cual es el numero de la sala">                                        
                    @error('numero_sala')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>   
                <div class="form-group col-6">
                    <label class="col-md-3 form-control-label" for="text-input">Cama</label>
                        <input type="text" name="numero_cama" class="form-control" placeholder="Cual es el numero de la cama">                                        
                    @error('numero_cama')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>                      
            </div>
        </div>
        </div>
        <div class="card-footer">
            <button wire:click='internarPaciente( {{ $paciente_id }} )' class="btn btn-success btn-sm" type="button"> <i class="fa fa-check"></i> Internar Paciente </button>
        </div>
    </div>
</div>
