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
            <li class="breadcrumb-item"><a href="{{ route('paciente.index') }}">Medicos</a></li>
            <li class="breadcrumb-item active">Crear Medico</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<form action="{{ route('paciente.update',['id'=>$paciente[0]->id]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    
    {{-- Formulario Datos --}}
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Informacion Personal</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-6">
                    <label for="nombre">Nombre</label> 
                    <input type="text" value="{{ $paciente[0]->nombre }}"  name="nombre" id="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror" placeholder="Escriba el nombre del paciente">
                    @error('nombre')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="apellidos">Apellidos</label> 
                    <input type="text" value="{{ $paciente[0]->apellidos }}" name="apellidos" id="apellidos" class="form-control form-control-sm @error('apellidos') is-invalid @enderror" placeholder="Escriba los apellidos del paciente">
                    @error('apellidos')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="apellidos">Carnet</label> 
                    <input type="text" value="{{ $paciente[0]->ci }}" name="ci" id="ci" class="form-control form-control-sm @error('ci') is-invalid @enderror" placeholder="escriba el CI del paciente">
                    @error('ci')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="numero_seguro">Nº de Seguro</label> 
                    <input type="numero_seguro" value="{{ $paciente[0]->numero_seguro }}" name="numero_seguro" id="numero_seguro" class="form-control form-control-sm @error('numero_seguro') is-invalid @enderror" placeholder="Escriba el numero del seguro del paciente">
                    @error('numero_seguro')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="">Telefono</label> 
                    <input name="telefono" type="text" value="{{ $paciente[0]->telefono }}" class="form-control form-control-sm @error('telefono') is-invalid @enderror" placeholder="" >
                    @error('telefono')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>



            <div class="row">
                <div class="form-group col-6">
                    <label>Fecha de Nacimiento</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text"  data-target="#reservationdate" class="form-control form-control-sm date-fecha @error('fecha_nacimiento') is-invalid @enderror " name="fecha_nacimiento" />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                        @error('fecha_nacimiento')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Nacionalidad</label>
                    <select name="nacionalidad" value="{{ $paciente[0]->nacionalidad }}" id="nacionalidad" class='select-nacionalidad form-control form-control-sm'  >
                        <option value="" >Seleccionar Pais</option>
                        @foreach (@paises() as $pais)
                        <option  value="{{ $pais->id }}">{{ $pais->name }}</option>
                        @endforeach
                    </select>
                    @error('nacionalidad')
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

    {{-- Formulario Direcciones --}}
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Direccion del Paciente</h3>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="form-group col-4">
                    <label for="departamento">Departamento</label>
                    <select name="departamento_id" id="departamentos" class='mi-selector form-control form-control-sm'  >
                        <option value="{{ $paciente[0]->departamento_id }}" >Seleccionar Departamento</option>
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
                        <option value="{{ $paciente[0]->provincia_id }}" >Seleccione antes un Dpto</option>
                        
                    </select>
                    @error('provincia_id')
                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="municipio_id">Municipios</label>
                    <select class="mi-selector form-control form-control-sm" name="municipio_id" id="municipios">
                        <option value="{{ $paciente[0]->municipio_id }}" >Seleccione antes una Provincia</option>
                        
                    </select>
                    @error('municipio_id')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="">Nº de Distrito</label>
                    <input name="distrito" value="{{ $paciente[0]->distrito }}" type="text" class="form-control form-control-sm @error('distrito') is-invalid @enderror" placeholder="Digite numero de distrito">
                    @error('distrito')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="">Nº de Domicilio</label>
                    <input name="numero_domicilio" value="{{ $paciente[0]->numero_domicilio }}" type="text" class="form-control form-control-sm @error('numero_domicilio') is-invalid @enderror" placeholder="Digite numero de domicilio">
                    @error('numero_domicilio')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="">Avenida/Calle</label>
                    <input name="avenida_calle" value="{{ $paciente[0]->avenida_calle }}" type="text" class="form-control form-control-sm @error('avenida_calle') is-invalid @enderror" placeholder="Escribir avenida o calle">
                    @error('avenida_calle')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="">Barrio/Zona</label>
                    <input name="barrio_zona" value="{{ $paciente[0]->barrio_zona }}" type="text" class="form-control form-control-sm @error('barrio_zona') is-invalid @enderror" placeholder="Escribir barrio o zona">
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
                    <input type="text"  name="name" id="name" value="{{ $paciente[0]->name }}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Escriba el name del paciente">
                    @error('name')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
    
                <div class="col-6">
                    <label for="password">Contraseña</label> 
                    <input type="password" name="password" id="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Escriba el password del paciente">
                    @error('password')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>
            <div class="row">
    
                <div class="col-6">
                    <label for="email">Correo electronico</label> 
                    <input type="email" name="email" value="{{ $paciente[0]->email }}" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Escriba el email del paciente">
                    @error('email')
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
    <script>
        $(document).ready(function(){
            
            $('#departamentos').on('change',function(){
                  var departamento_id = $(this).val();
                  mostrar_provincias(departamento_id);
                  
            });
  
            $('#provincias').on('change',function(){
                var provincia_id = $(this).val();
                mostrar_municipios(provincia_id);
            });
  
          });
  
          function mostrar_provincias(departamento_id){
              var provincias = @json(buscar_provincias(1));
              llenar_select_provincias(provincias);
          }
  
          function mostrar_municipios(provincia_id){
              if(provincia_id==1){
                  var municipios = @json(buscar_municipio(1));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==2){
                  var municipios = @json(buscar_municipio(2));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==3){
                  var municipios = @json(buscar_municipio(3));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==4){
                  var municipios = @json(buscar_municipio(4));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==5){
                  var municipios = @json(buscar_municipio(5));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==6){
                  var municipios = @json(buscar_municipio(6));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==7){
                  var municipios = @json(buscar_municipio(7));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==8){
                  var municipios = @json(buscar_municipio(8));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==9){
                  var municipios = @json(buscar_municipio(9));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==10){
                  var municipios = @json(buscar_municipio(10));
                  llenar_select_municipio(municipios);
              }
              if(provincia_id==11){
                  var municipios = @json(buscar_municipio(11));
                  llenar_select_municipio(municipios);
              } 
              if(provincia_id==12){
                  var municipios = @json(buscar_municipio(12));
                  llenar_select_municipio(municipios);
              } 
              if(provincia_id==13){
                  var municipios = @json(buscar_municipio(13));
                  llenar_select_municipio(municipios);
              } 
              if(provincia_id==14){
                  var municipios = @json(buscar_municipio(14));
                  llenar_select_municipio(municipios);
              } 
              if(provincia_id==15){
                  var municipios = @json(buscar_municipio(15));
                  llenar_select_municipio(municipios);
              } 
  
          }
  
          function llenar_select_provincias(provincias){
              $('#provincias').empty();
  
              document.getElementById('provincias').innerHTML+="<option disable value=''>Seleccionar Provincia</option>";
              for (let index = 0; index < provincias.length; index++) {
                  document.getElementById('provincias').innerHTML+= " <option  value='"+provincias[index].id+"'>"+provincias[index].nombre+"</option>"
              }
          }
  
          function llenar_select_municipio(municipios) {
              $('#municipios').empty();
              
              
              document.getElementById('municipios').innerHTML+="<option value =''>Seleccionar Municipio</option>";
  
              for (let index = 0; index < municipios.length; index++) {
                  document.getElementById('municipios').innerHTML+= " <option  value='"+municipios[index].id+"'>"+municipios[index].nombre+"</option>"
              }
          }
    </script>
@endsection