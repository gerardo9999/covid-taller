<div>
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
    
    @if ($listaMisPacientes)
        @include('sistema.modules.medicos.misPacientes.tableMisPaciente')
    @endif
    @if ($consultaFormulario)
        @include('sistema.modules.medicos.misPacientes.formularioConsulta')
    @endif

    @if ($internadoFormulario)
        @include('sistema.modules.medicos.misPacientes.formularioInternar')
    @endif
</div>
