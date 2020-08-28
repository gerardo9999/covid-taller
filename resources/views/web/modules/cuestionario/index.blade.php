@extends('welcome')
@section('contenido')
<br>
<br>
<br>
<br>
<br>
<br>

<section id="more-features" class="section-bg">


<div id="formulario">
    <div class="container">

        <div class="section-header">
            <h3 class="section-title">Completa el siguiente formulario</h3>
            <span class="section-divider"></span>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>


        <div class="row">

            <div class="col-lg-12">
                <div class="box fadeInLeft">
                  
        
                    <div class="row">

                        <div class="col-6">
                            <label for="nombre">Nombre</label> 
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror" placeholder="Escriba el nombre del paciente">
                            @error('nombre')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
        
                        <div class="col-6">
                            <label for="apellidos">Apellidos</label> 
                            <input type="text" name="apellidos" id="apellidos" class="form-control form-control-sm @error('apellidos') is-invalid @enderror" placeholder="Escriba los apellidos del paciente">
                            @error('apellidos')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-4">
                            <label for="apellidos">Carnet</label> 
                            <input type="text" name="ci" id="ci" class="form-control form-control-sm @error('ci') is-invalid @enderror" placeholder="escriba el CI del paciente">
                            @error('ci')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="numero_seguro">Nº de Seguro</label> 
                            <input type="numero_seguro" name="numero_seguro" id="numero_seguro" class="form-control form-control-sm @error('numero_seguro') is-invalid @enderror" placeholder="Escriba el numero del seguro del paciente">
                            @error('numero_seguro')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="">Telefono</label> 
                            <input name="telefono" type="text" class="form-control form-control-sm @error('telefono') is-invalid @enderror" placeholder="" >
                            @error('telefono')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
                    </div>
        
        
        
                    <div class="row">
                        <div class="form-group col-6">
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
                        <div class="form-group col-6">
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
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="box fadeInLeft">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="departamento">Departamento</label>
                            <select name="departamento_id" id="departamentos" onchange="seleccionarDepartamento()" class='mi-selector form-control form-control-sm'  >
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
                            <select class="mi-selector form-control form-control-sm " onchange="seleccionarProvincia()" name="provincia_id" id="provincias">
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
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12">
                <div class="box fadeInLeft">
                    <div class="row">
                        <div class="col-3">
                            <label for="">Nº de Distrito</label>
                            <input name="distrito" type="text" class="form-control form-control-sm @error('distrito') is-invalid @enderror" placeholder="Digite numero de distrito">
                            @error('distrito')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="">Nº de Domicilio</label>
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
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box fadeInLeft">
                        {{-- Credenciales de cuenta --}}
                        <div class="row">

                            <div class="col-6">
                                <label for="name">Nombre Usuario</label> 
                                <input type="text"  name="name" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Escriba el name del paciente">
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
                                <input type="email" name="email" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Escriba el email del paciente">
                                @error('email')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="text-center"><button class="btn btn-success" onclick="cuestionarios()" type="button" title="Send Message">Send Message</button></div>
        
    </div>
</div>

<div id="cuestionario" class="wow">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">Content</p>
        </div>
    </div>
</div>

</section>

<script>
    var cuestionario  =   document.getElementById('cuestionario');
    cuestionario.style.display="none";

    var nombre ;


    function seleccionarDepartamento(){
        var departamento_id = document.getElementById("departamentos").value;
        mostrar_provincias(departamento_id);
    }
    function seleccionarProvincia(){
        var provincia_id = document.getElementById("provincias").value;
        mostrar_municipios(provincia_id);   
    }
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
        document.getElementById('provincias').empty

          document.getElementById('provincias').innerHTML+="<option disable value=''>Seleccionar Provincia</option>";
          for (let index = 0; index < provincias.length; index++) {
              document.getElementById('provincias').innerHTML+= " <option  value='"+provincias[index].id+"'>"+provincias[index].nombre+"</option>"
          }
    }

    function llenar_select_municipio(municipios) {
          $('#municipios').empty();
          document.getElementById('municipios').empty
          
          document.getElementById('municipios').innerHTML+="<option value =''>Seleccionar Municipio</option>";

          for (let index = 0; index < municipios.length; index++) {
              document.getElementById('municipios').innerHTML+= " <option  value='"+municipios[index].id+"'>"+municipios[index].nombre+"</option>"
          }
    }


    function cuestionarios(){

        var formulario = document.getElementById("formulario");
        var preguntas = document.getElementById("cuestionario");

        formulario.style.display = "none";
        preguntas.style.display ="block";

        this.nombre = document.getElementById("nombre").value
        this.apellido = document.getElementById("apellido").value;
        alert(this.nombre) 
    }
</script>
@endsection