<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th >Paciente</th>
                <th style="width:10%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pacientes as $paciente)
            <tr>
                <td>
                    <a href="#" style="text-decoration: none">
                        <img data-toggle="modal" src="{{ asset($paciente->avatar) }}" width="48" height="48" class="rounded-circle mr-2" alt="Avatar">
                    </a>
                    <strong>{{ $paciente->nombre }} {{ $paciente->apellidos }}</strong>
                </td>
                    {{-- @include('sistema.modules.pacientes.imagen') --}}
                <td>
                    <a href="{{ route('paciente.edit', ['id'=> $paciente->id]) }}" type="button" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button wire:click='mostrarPerfil({{ $paciente->id }})' type="button" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i>
                    </button>
                    @include('sistema.modules.pacientes.destroy') 
                </td>
            </tr>                            
        @endforeach    
        </tbody>
    </table>
</div>
<div class="card-footer">
{{ $pacientes->render() }}
</div>