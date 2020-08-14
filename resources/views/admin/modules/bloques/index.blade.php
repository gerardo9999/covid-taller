@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ $hospital[0]->nombre }} 
        </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Hospitales</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/hospitales/plantas/') }}">Plantas</a></li>
            <li class="breadcrumb-item active">Bloque</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


@include('admin.components.flash')

<div class="col-12">
  <div class="card">
      <div class="card-header">
          {{-- @include('admin.modules.bloques.create') --}}
          @include('admin.modules.bloques.create')
          <h3 class="card-title"></h3>

          <div class="card-tools">
          @include('admin.modules.plantas.update')
          @include('admin.modules.plantas.destroy')
          </div>
      </div>
              <!-- /.card-header -->
      {{-- <div class="card-body table-responsive p-0">
      </div> --}}
  </div>
</div>
<!-- /.row -->
<div class="row">
  @foreach ($bloques as $bloque)
    <div class="col-lg-6 col-12">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $bloque->nombre }}<sup style="font-size: 20px"></sup></h3>
          <small>Salas 10</small> - <small>Salas 10</small>

        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('habitacion.index', ['id'=>$bloque->id]) }}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  @endforeach
</div>
@endsection
