@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Modificar Hospital</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Hospital</a></li>
            <li class="breadcrumb-item active">Modificar Hospital</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<form action="{{ route('hospital.update',['id'=>$hospital[0]->id]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
{{-- Formulario Datos --}}
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Informacion del Hospital</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <label for="nombre">Hospital</label> 
                    <input type="text" name="nombre" value="{{ $hospital[0]->nombre }}" id="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror" placeholder="Escriba el nombre del hospital">
                    @error('nombre')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-6">
                        <label for="niveles">Nivel</label>
                        <select  name="nivel" id="niveles" class='mi-selector form-control form-control-sm'  >
                            <option value="{{ $hospital[0]->nivel }}" >{{ $hospital[0]->nivel }}</option>
                            <option  value="primer">Primer Nivel</option>
                            <option  value="segundo">Secundo Nivel</option>
                            <option  value="tercer">Tercer Nivel </option>
                            <option  value="cuarto">Cuarto Nivel</option>
                            <option  value="quinto">Quinto Nivel</option>
                        </select>
                        @error('nivel')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="">Telefono</label> 
                    <input name="telefono" value="{{ $hospital[0]->telefono }}" type="text" class="form-control form-control-sm @error('telefono') is-invalid @enderror" placeholder="Digite un numero de telefono">
                    @error('telefono')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label class="form-label w-100">Seleccione una imagen</label>
                    <input type="file" name="imagen">
                    <small class="form-text text-muted">Solo imagen jpg</small>
                    @error('imagen')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>

            
        </div>
    </div>

{{-- Formulario Direcciones --}}
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Direccion del Hospital</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="form-group col-4">
                    <label for="departamento">Departamento</label>
                    <select name="departamento_id" id="departamentos" class='mi-selector form-control form-control-sm'  >
                        <option value="{{ $hospital[0]->departamento_id }}" >Seleccionar Departamento</option>
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
                        <option value="{{ $hospital[0]->provincia_id }}" >Seleccione antes un Dpto</option>
                        
                    </select>
                    @error('provincia_id')
                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="provincia_id">Municipios</label>
                    <select class="mi-selector form-control form-control-sm" name="municipio_id" id="municipios">
                        <option value="{{ $hospital[0]->municipio_id }}" >Seleccione antes una Provincia</option>
                        
                    </select>
                    @error('municipio_id')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <label for="provincia_id">Numero de Distrito</label>
                    <input name="distrito" value="{{ $hospital[0]->distrito }}" type="text" class="form-control form-control-sm @error('distrito') is-invalid @enderror" placeholder="Digite numero de distrito">
                    @error('distrito')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="provincia_id">Numero de Domicilio</label>
                    <input name="numero_domicilio" value="{{ $hospital[0]->numero_domicilio }}" type="text" class="form-control form-control-sm @error('numero_domicilio') is-invalid @enderror" placeholder="Digite numero de domicilio">
                    @error('numero_domicilio')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="provincia_id">Avenida/Calle</label>
                    <input name="avenida_calle" type="text"  value="{{ $hospital[0]->avenida_calle }}" class="form-control form-control-sm @error('avenida_calle') is-invalid @enderror" placeholder="Escribir avenida o calle">
                    @error('avenida_calle')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="provincia_id">Barrio/Zona</label>
                    <input name="barrio_zona" type="text" value="{{ $hospital[0]->barrio_zona }}" class="form-control form-control-sm @error('barrio_zona') is-invalid @enderror" placeholder="Escribir barrio o zona">
                    @error('barrio_zona')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

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