<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Mis Prescripciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Mis Prescripciones</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
      
            @include('sistema.components.flash')
        <div class="row">
            <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
            
                    <div class="card-tools">
                        <div class="btn-group">
                            <form>
                                <div class="input-group-prepend">
                                    <input  type="date" class="form-control" name="fecha" placeholder="Buscar..." wire:model='searchText'>
                                    <button disabled  class="btn btn-info btn-sm" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th >Medicamento</th>
                                    <th >Dosis</th>
                                    <th >Indicaciones</th>
                                    <th> Fecha Realizada</th>
                                    <th> Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ @userIdAuth() }} --}}
                            @foreach ($prescripciones as $prescripcion)
                                    <tr>
                                        <td>{{ $prescripcion->medicamento }}</td> 
                                        <td>{{ $prescripcion->cantidad_producto }}</td> 
                                        <td>{{ $prescripcion->indicaciones }}</td> 
                                        <td>{{ @consulta($prescripcion->consulta_id)->fecha_programada }}</td> 
                                        <td>
                                                <a href="{{ route('miPrescripcion.pdf', ['id'=>$prescripcion->prescripcion_id]) }}" type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>      
                                                
                                        </td> 
                                    </tr>  
                            @endforeach    
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">
                    {{ $prescripciones->render() }}
                </div>
            </div>
            </div>
            
        </div>
    </div>
    
</div>
