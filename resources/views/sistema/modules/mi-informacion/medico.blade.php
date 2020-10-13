@extends('principal.index')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Medico</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Mis Medicos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@include('sistema.components.flash')
    <div class="card card-solid">
        <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            @foreach ($medico as $medic)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">

                    </div>
                    <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                        <h2 class="lead"><b>{{ $medic->nombre }} {{ $medic->apellidos }}</b></h2>
                        <p class="text-muted text-sm"><b>Medico: </b>  {{ @especialidad($medic->medico_id)->nombre }}  </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{ hospital($medic->medico_id)->nombre }}</li>
                            <li class="small"><span class="fa-li"></li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono #: {{ $medic->telefono }}</li>
                            <li class="small"><span class="fa-li"><i class="">@</i></span>  {{ @usuario($medic->medico_id)->email }}</li>
                        </ul>
                        </div>
                        <div class="col-5 text-center">
                        <img src="{{ asset(@avatar($medic->medico_id)[0]->avatar) }}" alt="Foto" class="img-circle img-fluid">
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-right">
                        {{-- <a href="#" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                        </a> --}}
                    </div>
                    </div>
                </div>
                </div>
            @endforeach

        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        
        </div>
        <!-- /.card-footer -->
    </div>
@endsection
