
<a href="#" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy-planta{{ $plantas[0]->id }}">
    <i class="fas fa-trash"></i>
</a>
<div id="destroy-planta{{ $plantas[0]->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-danger">
                <h5 class="modal-title" id="my-modal-title">Modificar Planta</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('planta.destroy',['id'=>$plantas[0]->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="planta">Planta</label>
                    <p>Seguro que deseas eliminar la planta {{ $plantas[0]->nombre }}</p>
                    <input type="hidden" class="form-control" value="{{ $plantas[0]->hospital_id }}" name="hospital_id" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>