<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-medicos{{ $paciente->id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-medicos{{ $paciente->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-danger">
                <h5 class="modal-title" id="my-modal-title">Elimnar Medico</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('paciente.destroy', ['id'=> $paciente->id ]) }}" method="post">
                @csrf
            <div class="modal-body">
                <p>Seguro que desea eliminar el paciente {{ $paciente->nombre }}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>