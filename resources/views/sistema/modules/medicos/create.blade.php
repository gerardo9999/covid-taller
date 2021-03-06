@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Crear Medico</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('medico.index') }}">Medicos</a></li>
            <li class="breadcrumb-item active">Crear Medico</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<form action="{{ route('medico.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    {{-- Formulario Datos --}}
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Informacion Personal</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-5">
                    <label for="nombre">Nombre</label> 
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror" placeholder="Escriba el nombre del medico">
                    @error('nombre')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>

                <div class="col-5">
                    <label for="apellidos">Apellidos</label> 
                    <input type="text" name="apellidos" id="apellidos" class="form-control form-control-sm @error('apellidos') is-invalid @enderror" placeholder="Escriba el apellidos del medico">
                    @error('apellidos')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                
                <div class="col-2">
                    <label for="apellidos">Carnet</label> 
                    <input type="text" name="ci" id="ci" class="form-control form-control-sm @error('ci') is-invalid @enderror" placeholder="">
                    @error('ci')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-5">
                    <label>Fecha de Nacimiento</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" data-target="#reservationdate" class="form-control form-control-sm date-fecha @error('fecha_nacimiento') is-invalid @enderror " name="fecha_nacimiento" />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                        @error('fecha_nacimiento')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                </div>


                <div class="form-group col-5">
                    <label for="">Nacionalidad</label>
                    <select name="nacionalidad" id="nacionalidad" class='select-nacionalidad form-control form-control-sm'  >
                        <option value="" >Seleccionar Pais</option>
                        @foreach (@paises() as $pais)
                        <option  value="{{ $pais->id }}">{{ $pais->name }}</option>
                        @endforeach
                    </select>
                    @error('nacionalidad')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>

                <div class="form-group col-2">
                    <label for="">Telefono</label> 
                    <input name="telefono" type="text" class="form-control form-control-sm @error('telefono') is-invalid @enderror" placeholder="" >
                    @error('telefono')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>



            <div class="row">
                <div class="form-group col-4 clearfix">

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" value="hombre" name="sexo">

                        <label for="radioPrimary1">
                            Hombre
                        </label>
                    </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" value="mujer" name="sexo">
                        <label for="radioPrimary2">
                            Mujer
                        </label>
                        @error('sexo')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Datos laborales --}}
    <div class="card card-dark">
        <div class="card-header">
            Datos Laborales
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="form-group col-6">
                    <label for="">Trabaja en?</label>
                    <select name="hospital" id="hospital" class='select-hospital form-control form-control-sm'  >
                        <option value="" >Seleccionar Hospital</option>
                        @foreach (@hospitales() as $hospital)
                        <option  value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
                        @endforeach
                    </select>
                    @error('hospital')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Especialidad laboral?</label>
                    <select name="especialidad" id="especialidad" class='select-especialidad form-control form-control-sm'  >
                        <option value="" >Seleccionar Especialidad</option>
                        @foreach (@especialidades() as $especialidad)
                        <option  value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                        @endforeach
                    </select>
                    @error('especialidad')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>

            </div>
        </div>
    </div>

    {{-- Formulario Direcciones --}}
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Direccion del Medico</h3>
        </div>
        
        <div class="card-body">
            @include('sistema.components.select')

            <div class="row">
                <div class="col-3">
                    <label for="">Numero de Distrito</label>
                    <input name="distrito" type="text" class="form-control form-control-sm @error('distrito') is-invalid @enderror" placeholder="Digite numero de distrito">
                    @error('distrito')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="">Numero de Domicilio</label>
                    <input name="numero_domicilio" type="text" class="form-control form-control-sm @error('numero_domicilio') is-invalid @enderror" placeholder="Digite numero de domicilio">
                    @error('numero_domicilio')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="">Avenida/Calle</label>
                    <input name="avenida_calle" type="text" class="form-control form-control-sm @error('avenida_calle') is-invalid @enderror" placeholder="Escribir avenida o calle">
                    @error('avenida_calle')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="">Barrio/Zona</label>
                    <input name="barrio_zona" type="text" class="form-control form-control-sm @error('barrio_zona') is-invalid @enderror" placeholder="Escribir barrio o zona">
                    @error('barrio_zona')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>
            
        </div>
        <!-- /.card-body -->
    </div>

    {{-- Credenciales de cuenta --}}
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Credenciales de Usuario</h3>
        </div>
        <div class="card-body">
            <div class="row">
    
                <div class="col-6">
                    <label for="name">Nombre Usuario</label> 
                    <input type="text" name="name" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Escriba el name del medico">
                    @error('name')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
    
                <div class="col-6">
                    <label for="password">Contraseña</label> 
                    <input type="password" name="password" id="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Escriba el password del medico">
                    @error('password')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>
            <div class="row">
    
                <div class="col-6">
                    <label for="email">Correo electronico</label> 
                    <input type="email" name="email" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Escriba el email del medico">
                    @error('email')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
    
                <div class="col-6">
                    <label for="codigo_medico">Codigo </label> 
                    <input type="text" name="codigo_medico" id="codigo_medico" class="form-control form-control-sm @error('codigo_medico') is-invalid @enderror" placeholder="Escriba el codigo del medico">
                    @error('codigo_medico')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>
        </div>
    </div>    

    {{-- Botondes de accion  --}}
    <div class="card">
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Guardar Registro</button>
            <button type="reset" class="btn btn-danger btn-sm">Cancelar Registro</button>
        </div>
    </div>
</form>
@endsection
@section('hospital-create')
@include('sistema.components.direccion')
@endsection