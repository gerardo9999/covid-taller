<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-provincia{{ $provincia->id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-provincia{{ $provincia->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-danger">
                <h5 class="modal-title" id="my-modal-title">Agregar Provincia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('provincia.destroy', ['id'=> $provincia->id ]) }}" method="post">
                @csrf
            <div class="modal-body">
                <p>Esta seguro que desea eliminar la provincia {{ $provincia->nombre }}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>