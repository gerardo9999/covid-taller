<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-municipio{{ $municipio->id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-municipio{{ $municipio->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-danger">
                <h5 class="modal-title" id="my-modal-title">Agregar Provincia</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('municipio.destroy', ['id'=> $municipio->id ]) }}" method="post">
                @csrf
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>