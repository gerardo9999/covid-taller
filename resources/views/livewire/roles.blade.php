<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Roles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
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
                  {{-- @include('sistema.modules.pacientes.create') --}}
    
        
              </div>
                      <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                          <thead>
                              <tr>
                                  <th >Rol</th>
                                  {{-- <th style="width:10%">Acciones</th> --}}
                              </tr>
                          </thead>
                          <tbody>
                          @foreach ($roles as $rol)
                              <tr>
                                  <td>
                                     {{ $rol->name }}
                                  </td>
                                      {{-- @include('sistema.modules.pacientes.imagen') --}}
                                 
                              </tr>                            
                          @endforeach    
                          </tbody>
                      </table>
              </div>
              <div class="card-footer">

              </div>
          </div>
        </div>
        
    </div>
</div>
