<div>
    @if ($lista)
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pacientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pacientes</li>
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
                    <a class="btn btn-sm btn-info" href="{{ route('paciente.create') }}">Agregar Medico</a>
                    <h3 class="card-title"></h3>
            
                    <div class="card-tools">
                        @include('sistema.modules.pacientes.search')
                    </div>
                </div>
                        <!-- /.card-header -->
                @include('sistema.modules.pacientes.table')
            </div>
            </div>
            
        </div>
    @endif
    @if ($perfil)
           @include('sistema.modules.pacientes.perfil')
    @endif
</div>
