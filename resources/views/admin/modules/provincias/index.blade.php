@extends('principal.index')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Provincias</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Provincias</li>
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
                @include('admin.modules.provincias.create')
                <h3 class="card-title"></h3>
      
                <div class="card-tools">
                    @include('admin.modules.provincias.search')
                </div>
            </div>
                    <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Provincia</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($provincias as $provincia)
                            <tr>
                                <td>{{ $provincia->id }}</td>
                                <td>{{ $provincia->nombre }}</td>
                                <td>
                                    @include('admin.modules.provincias.update')
                                    @include('admin.modules.provincias.destroy')
                                </td>
                            </tr>                            
                        @endforeach    
                        </tbody>
                    </table>
            </div>
            <div class="card-footer">
                {{ $provincias->render() }}
            </div>
        </div>
                  <!-- /.card -->
    </div>
</div>
@endsection