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
                   

                    <div class="form-group col-12 border">
                        <label for="">Paciente :  </label>
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
        <div class="card">
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Guardar Registro</button>
            </div>
        </div>
        {{-- </form> --}}

    </div> 
</div>
