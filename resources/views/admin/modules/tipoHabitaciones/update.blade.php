<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-tipoHabitacion{{ $tipoHabitacion->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-tipoHabitacion{{ $tipoHabitacion->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Tipo de Habitacion</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tipoHabitacion.update',['id'=>$tipoHabitacion->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipoHabitacion">Tipo de Habitacion</label>
                    <input type="text" class="form-control" value="{{ $tipoHabitacion->nombre }}" name="nombre" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>