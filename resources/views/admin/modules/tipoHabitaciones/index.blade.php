@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tipo Habitaciones</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Tipo Habitaciones</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@include('admin.components.flash')
<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @include('admin.modules.tipoHabitaciones.create')
                <h3 class="card-title"></h3>
      
                <div class="card-tools">
                    @include('admin.modules.tipoHabitaciones.search')
                </div>
            </div>
                    <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo Habitacion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tipoHabitaciones as $tipoHabitacion)
                            <tr>
                                <td>{{ $tipoHabitacion->id }}</td>
                                <td>{{ $tipoHabitacion->nombre }}</td>
                                <td>
                                    @include('admin.modules.tipoHabitaciones.update')
                                    @include('admin.modules.tipoHabitaciones.destroy')
                                </td>
                            </tr>                            
                        @endforeach    
                        </tbody>
                    </table>
            </div>
            <div class="card-footer">
                {{ $tipoHabitaciones->render() }}
            </div>
                    <!-- /.card-body -->
        </div>
                  <!-- /.card -->
    </div>
</div>
@endsection
