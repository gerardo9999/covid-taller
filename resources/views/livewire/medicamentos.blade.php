<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Medicametos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Medicametos</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @include('sistema.components.flash')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    @include('sistema\modules\medicamentos\create')
                    <h3 class="card-title"></h3>
          
                    <div class="card-tools">
                        @include('sistema.modules.medicamentos.search')
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Medicamento</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($medicamentos as $medicamento)
                                <tr>
                                    <td>{{ $medicamento->id }}</td>
                                    <td>{{ $medicamento->nombre }}</td>
                                    <td>
                                        @include('sistema.modules.medicamentos.update')
                                        @include('sistema.modules.medicamentos.destroy')
                                    </td>
                                </tr>                            
                            @endforeach    
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">
                    {{ $medicamentos->render() }}
                </div>
                        <!-- /.card-body -->
            </div>
                      <!-- /.card -->
        </div>
    </div>
</div>
