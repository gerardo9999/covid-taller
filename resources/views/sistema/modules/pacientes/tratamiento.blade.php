@extends('principal.index')
@section('content')
   <div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Paciente - Tratamiento</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Paciente - Tratamiento</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
    @include('sistema.components.flash')
    <div>
        {{-- <form action="{{ route('consulta.store') }}" method="post"> --}}
            @csrf
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Informacion Consulta</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12 border p-3 text-center">
                        <label for="">Paciente :  {{ $personaPaciente->nombre}}</label>
                    </div>                      
                </div>
                
                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Tratamiento Medico</label>   
                            <div class="input-group-prepend">
                                <select name="tratamiento" id="tratamiento" class='select-nacionalidad form-control form-control-sm'  >
                                    <option value="" >Seleccionar Tratamiento</option>
                                    @foreach (@tratamientos() as $tratamiento)
                                    <option  
                                    value="{{ $tratamiento->id }}">{{ $tratamiento->nombre }}</option>
                                    @endforeach
                                </select>
                                <button  class="btn btn-info btn-sm" type="button"><i class="fas fa-search" wire:click="mostrarLista_medico()"></i></button>
                                @error('tratamiento')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                            </div>












                    </div>


                    <div class="col-6">
                        <label for="apellidos">Dias de Tratamiento</label> 
                        <input type="number" name="dias" id="dias" class="form-control form-control-sm @error('dias') is-invalid @enderror" placeholder="Escriba motivo de la consulta">
                            @error('dias')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                    </div>
                </div>

            </div>
        </div> 
        <div class="card">
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Guardar Registro</button>
            </div>
        </div>
        {{-- </form> --}}

    </div> 
</div>

@endsection