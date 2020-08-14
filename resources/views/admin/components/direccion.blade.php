{{-- Controla los select del departamento , provincia y municipio --}}
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