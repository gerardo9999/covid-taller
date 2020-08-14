@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Medicos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Medicos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@include('admin.components.flash')
<!-- /.row -->
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header">
                {{-- @include('admin.modules.medicos.create') --}}
                <a class="btn btn-sm btn-info" href="{{ route('medico.create') }}">Agregar Medico</a>
                <h3 class="card-title"></h3>
      
                <div class="card-tools">
                    @include('admin.modules.medicos.search')
                </div>
            </div>
                    <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th >Medico</th>
                                <th style="width:10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($medicos as $medico)
                            <tr>
                                <td>
                                    <a href="#" style="text-decoration: none">
                                        <img data-toggle="modal" src="{{ asset($medico->avatar) }}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar">
                                    </a>
                                    <strong>{{ $medico->nombre }}</strong>
                                </td>
                                    {{-- @include('admin.modules.medicos.imagen') --}}
                                <td>
                                    <a href="{{ route('medico.edit', ['id'=> $medico->id]) }}" type="button" class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>                                    
                                    @include('admin.modules.medicos.destroy') 
                                </td>
                            </tr>                            
                        @endforeach    
                        </tbody>
                    </table>
            </div>
            <div class="card-footer">
                {{ $medicos->render() }}
            </div>
        </div>
    </div>
    <div class="col-5">

        
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>@pacientesCount()</h3>
                <p>Pacientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-eye"></i>
              </div>
              <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
        </div>

        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Salas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</div>
@endsection