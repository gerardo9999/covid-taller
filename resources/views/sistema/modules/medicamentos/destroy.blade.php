<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-medicamento{{ $medicamento->id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-medicamento{{ $medicamento->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-danger">
                <h5 class="modal-title" id="my-modal-title">Agregar Medicamento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('medicamento.destroy', ['id'=> $medicamento->id ]) }}" method="post">
                @csrf
            <div class="modal-body">
                <p>Seguro que desea eliminar la medicamento? {{ $medicamento->nombre }}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>