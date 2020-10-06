<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-especialidad{{ $especialidad->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-especialidad{{ $especialidad->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Especialidad</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('especialidad.update',['id'=>$especialidad->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" class="form-control" value="{{ $especialidad->nombre }}" name="especialidad" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>