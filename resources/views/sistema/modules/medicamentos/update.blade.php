<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-medicamento{{ $medicamento->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-medicamento{{ $medicamento->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Medicamento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('medicamento.update',['id'=>$medicamento->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="medicamento">Medicamento</label>
                    <input type="text" class="form-control" value="{{ $medicamento->nombre }}" name="medicamento" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>