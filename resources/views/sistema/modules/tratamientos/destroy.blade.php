<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-tratamiento{{ $tratamiento->tratamiento_id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-tratamiento{{ $tratamiento->tratamiento_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-danger">
                <h5 class="modal-title" id="my-modal-title">Eliminar Tratamiento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tratamiento.destroy', ['id'=> $tratamiento->tratamiento_id ]) }}" method="post">
                @csrf
            <div class="modal-body">
                <p>Seguro que desea eliminar el tratamiento? {{ $tratamiento->tratamiento_id }}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>