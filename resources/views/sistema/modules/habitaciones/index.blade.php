@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ $hospital[0]->nombre }} - 
            {{ $planta[0]->planta }}
        

        </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Hospitales</a></li> --}}
            {{-- <li class="breadcrumb-item"><a href="{{ url('hospitales/plantas/'.$hospital[0]->id) }}">Plantas</a></li> --}}
            {{-- <li class="breadcrumb-item"><a href="{{ url('hospitales/bloques/'.$bloque[0]->id) }}">Bloque</a></li> --}}
            <li class="breadcrumb-item active">Habitacion</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


@include('admin.components.flash')

<div class="col-12">
  <div class="card">
      <div class="card-header">
          @include('admin.modules.tipoHabitaciones.create')
          {{-- @include('admin.modules.salas.create') --}}
          <h3 class="card-title"></h3>

          <div class="card-tools">
          @include('admin.modules.bloques.update')
          @include('admin.modules.bloques.destroy')
          </div>
      </div>
              <!-- /.card-header -->
      {{-- <div class="card-body table-responsive p-0">
      </div> --}}
  </div>
</div>
<!-- /.row -->
<div class="row">
  @foreach ($tipoHabitaciones as $tipoHabitacion)
    <div class="col-lg-4 col-12">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $tipoHabitacion->nombre }}<sup style="font-size: 20px"></sup></h3>
          <small>Salas 10</small> - <small>Salas 10</small>
        </div>

        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
          @include('admin.modules.habitaciones.create')             
      </div>
    </div>
  @endforeach
</div>
@endsection
