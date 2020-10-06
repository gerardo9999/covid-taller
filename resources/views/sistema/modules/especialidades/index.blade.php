@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Especialidad</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Especialidad</li>
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
                @include('admin.modules.especialidades.create')
                <h3 class="card-title"></h3>
      
                <div class="card-tools">
                    @include('admin.modules.especialidades.search')
                </div>
            </div>
                    <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Especialidad</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($especialidades as $especialidad)
                            <tr>
                                <td>{{ $especialidad->id }}</td>
                                <td>{{ $especialidad->nombre }}</td>
                                <td>
                                    @include('admin.modules.especialidades.update')
                                    @include('admin.modules.especialidades.destroy')
                                </td>
                            </tr>                            
                        @endforeach    
                        </tbody>
                    </table>
            </div>
            <div class="card-footer">
                {{ $especialidades->render() }}
            </div>
                    <!-- /.card-body -->
        </div>
                  <!-- /.card -->
    </div>
</div>
@endsection
