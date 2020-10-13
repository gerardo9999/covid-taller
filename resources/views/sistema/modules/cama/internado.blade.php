@extends('principal.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ $hospital->nombre }}</h1>
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
<div class="card card-info">
    <div class="card-header">
        {{-- @include('sistema.modules.pacientes.create') --}}
        {{-- <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a> --}}
        <h3 class="card-title">
            Internar Paciente
        </h3>

        <div class="card-tools">
            {{-- @include('sistema.modules.pacientes.search') --}}
        </div>
    </div>
    <div class="card-body">
       <div class="border p-4">
            <strong>Paciente : </strong> {{ $pacientePersona->nombre }} {{ $pacientePersona->apellidos }}
       </div>
       <form action="{{ route('internar.store', ['id'=>$paciente->id]) }}" method="post">
        @csrf
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
        <button class="btn btn-sm btn-success" type="submit">Internar Paciente</button>
    </div>
        </form>
</div>
@endsection