@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pacientes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Pacientes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@include('admin.components.flash')
<!-- /.row -->
<div class="row">
    <div class="col-12">
      <div class="card card-info">
          <div class="card-header">
              {{-- @include('admin.modules.pacientes.create') --}}
              <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a>
              <h3 class="card-title"></h3>
    
              <div class="card-tools">
                  @include('admin.modules.pacientes.search')
              </div>
          </div>
                  <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                      <thead>
                          <tr>
                              <th >Paciente</th>
                              <th style="width:10%">Acciones</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($pacientes as $paciente)
                          <tr>
                              <td>
                                  <a href="#" style="text-decoration: none">
                                      <img data-toggle="modal" src="{{ asset($paciente->avatar) }}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar">
                                  </a>
                                  <strong>{{ $paciente->nombre }} {{ $paciente->apellidos }}</strong>
                              </td>
                                  {{-- @include('admin.modules.pacientes.imagen') --}}
                              <td>
                                  <a href="{{ route('paciente.edit', ['id'=> $paciente->id]) }}" type="button" class="btn btn-sm btn-success">
                                      <i class="fas fa-edit"></i>
                                  </a>                                    
                                  @include('admin.modules.pacientes.destroy') 
                              </td>
                          </tr>                            
                      @endforeach    
                      </tbody>
                  </table>
          </div>
          <div class="card-footer">
              {{ $pacientes->render() }}
          </div>
      </div>
    </div>
    
</div>
@endsection