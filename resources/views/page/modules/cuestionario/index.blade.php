@extends('welcome')
@section('contenido')
<br>
<br>
<br>
<br>
<br>
<br>

<section id="more-features" class="section-bg">




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
    errorArray = [];

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
    function guardarDatos(){
        var nombre           = document.getElementById('nombre').value;
        var apellidos        = document.getElementById('apellidos').value;
        var ci               = document.getElementById('ci').value;
        var numero_seguro    = document.getElementById('numero_seguro').value;
        var telefono         = document.getElementById('telefono').value;
        var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
        var nacionalidad     = document.getElementById('nacionalidad').value;
        var hombre           = document.getElementById('hombre').value;
        var mujer            = document.getElementById('mujer').value;
        var departamento_id  = document.getElementById('departamento_id').value;
        var provincia_id     = document.getElementById('provincia_id').value;
        var municipio_id     = document.getElementById('municipio_id').value;
        var distrito         = document.getElementById('distrito').value;
        var numero_domicilio = document.getElementById("numero_domicilio").value;
        var avenida_calle    = document.getElementById("avenida_calle").value;
        var barrio_zona      = document.getElementById("barrio_zona").value;
        var name             = document.getElementById("name").value;
        var password         = document.getElementById("password").value;
        var email            = document.getElementById("email").value;


        alert(nacionalidad);
        alert(hombre);
        
    } 
    function validacion() {
        var nombre           = document.getElementById('nombre').value;
        var apellidos        = document.getElementById('apellidos').value;
        var ci               = document.getElementById('ci').value;
        var numero_seguro    = document.getElementById('numero_seguro').value;
        var telefono         = document.getElementById('telefono').value;
        var fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
        var nacionalidad     = document.getElementById('nacionalidad').value;
        var hombre           = document.getElementById('hombre').value;
        var mujer            = document.getElementById('mujer').value;
        var departamento_id  = document.getElementById('departamento_id').value;
        var provincia_id     = document.getElementById('provincia_id').value;
        var municipio_id     = document.getElementById('municipio_id').value;
        var distrito         = document.getElementById('distrito').value;
        var numero_domicilio = document.getElementById("numero_domicilio").value;
        var avenida_calle    = document.getElementById("avenida_calle").value;
        var barrio_zona      = document.getElementById("barrio_zona").value;
        var name             = document.getElementById("name").value;
        var password         = document.getElementById("password").value;
        var email            = document.getElementById("email").value;


    }



    function cuestionarios(){

        if(nombre === "" ){
            alert("El nombre no puede estar vacio");
        }



        if(nombre){
            alert(nombre);
        }


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