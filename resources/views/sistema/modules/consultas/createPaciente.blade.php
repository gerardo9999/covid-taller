@extends('principal.index')
@section('content')
@role('medico')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Consulta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Mis Pacientes</a></li>
                <li class="breadcrumb-item active">Crear Consulta</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <form action="{{ route('consulta.store.medico') }}" method="post">
            @csrf
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Informacion Consulta</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-6">
                            <label for="">Paciente</label>
                            
                            <div class="input-group-prepend">
                                <select name="paciente" id="paciente" class='select-nacionalidad form-control form-control-sm'  >
                                    <option  value="{{ $persona->id }}">{{ $persona->nombre }} {{ $persona->apellidos }}</option>
                                </select>
                            </div>
                        </div>    
                        <div class="form-group col-6">
                            <label for="">Hora Programada</label>
                            
                            <label class="col-md-3 form-control-label" for="text-input">Hora</label>
                                <input type="time" name="hora_programada" class="form-control" placeholder="Hora de Reserva">                                        
                            @error('hora_programada')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>                      
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Fecha de Programada</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" data-target="#reservationdate" class="form-control form-control-sm date-fecha @error('fecha_programada') is-invalid @enderror " name="fecha_programada" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                                @error('fecha_programada')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                        </div>
                        <div class="col-6">
                            <label for="apellidos">Motivo Consulta</label> 
                            <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control form-control-sm @error('motivo_consulta') is-invalid @enderror" placeholder="Escriba motivo de la consulta">
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
                    <button type="submit" class="btn btn-success btn-sm">Guardar Registro</button>
                    <a href="{{ route('consulta.index') }}" class="btn btn-danger btn-sm">Cancelar Registro</a>

                </div>
            </div>
        </form>
@endrole
@endsection