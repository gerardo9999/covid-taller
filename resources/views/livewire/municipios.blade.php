<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Municipios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('provincia.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Municipios</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('sistema.components.flash')
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    @include('sistema.modules.municipios.create')
                    <h3 class="card-title"></h3>
          
                    <div class="card-tools">
                        @include('sistema.modules.municipios.search')
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Municipio</th>
                                    <th>Provincia</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($municipios as $municipio)
                                <tr>
                                    <td>{{ $municipio->id }}</td>
                                    <td>{{ $municipio->municipio }}</td>
                                    <td>{{ $municipio->provincia }}</td>
                                    <td>
                                        @include('sistema.modules.municipios.update')
                                        @include('sistema.modules.municipios.destroy')
                                    </td>
                                </tr>                            
                            @endforeach    
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">
                    {{ $municipios->render() }}
                </div>
                        <!-- /.card-body -->
            </div>
                      <!-- /.card -->
        </div>
    </div>
</div>
