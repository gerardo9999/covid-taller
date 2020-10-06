{{-- <a href="#" type="button" class="btn btn-sm btn-danger">
    <i class="fas fa-lock"></i>
</a>  --}}
<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-consultas{{ $consulta->id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-consultas{{ $consulta->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content  modal-danger">
            <div class="modal-header modal-danger">
                <h5 class="modal-title" id="my-modal-title">Elimnar Consulta Medica</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('consulta.delete.medico', ['id'=> $consulta->id ]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <p>Seguro que desea eliminar el consulta?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
