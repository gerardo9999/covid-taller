@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Hospitales</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Hospitales</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@include('admin.components.flash')
<!-- /.row -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <a class="btn btn-sm btn-info" href="{{ route('hospital.create') }}">Agregar Hospital</a>
        <div class="card-tools">
          <div class="btn-group">
            @include('admin.modules.hospitales.search')

          </div>
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>


          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">
   
              <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                          <thead>
                              <tr>
                                  <th >Hospital</th>
                                  <th style="width:10%">Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach ($hospitales as $hospital)
                              <tr class="
                                              @if($hospital->nivel == 'primer') table-primary @endif
                                              @if($hospital->nivel == 'segundo') table-success @endif
                                              @if($hospital->nivel == 'tercer') table-warning @endif
                                              @if($hospital->nivel == 'cuarto') table-danger @endif
                                              @if($hospital->nivel == 'quinto') table-secondary @endif ">
                                  <td>
  
                                      <a href="#" style="text-decoration: none">
                                          <img data-toggle="modal" data-target="#modal1{{ $hospital->id }}" src="{{ asset($hospital->imagen) }}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar">
                                      </a>
                                      <strong>{{ $hospital->nombre }}</strong>
                                  </td>
                                      @include('admin.modules.hospitales.imagen')
                                  <td>
                                      <a href="{{ route('hospital.show', ['id'=>$hospital->id]) }}" type="button" class="btn btn-sm btn-primary">
                                          <i class="fas fa-eye"></i>
                                      </a> 
                                    
                                      <a href="{{ route('planta.index', ['id'=>$hospital->id]) }}" type="button" class="btn btn-sm btn-primary">
                                          <i class="fas fa-cog"></i>
                                      </a> 
                                      <a href="{{ route('hospital.edit', ['id'=>$hospital->id]) }}" type="button" class="btn btn-sm btn-success">
                                          <i class="fas fa-edit"></i>
                                      </a>                                    
                                      @include('admin.modules.hospitales.destroy') 
                                  </td>
                              </tr>                            
                          @endforeach    
                          </tbody>
                      </table>
              </div>

          </div>
        </div>
      <div class="card-footer">
          {{ $hospitales->render() }}
        <!-- /.row -->
      </div>
    </div>
  </div>
</div>
@endsection