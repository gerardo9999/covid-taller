<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#create-tipoHabitacion">Agregar Tipo de Habitaciones</button>
<div id="create-tipoHabitacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Tipo de Habitacion</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tipoHabitacion.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tipoHabitacion">Tipo de Habitacion</label>
                            <input type="text" class="form-control" name="nombre" >
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>