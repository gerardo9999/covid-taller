<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#create-especialidad">Agregar Especialidad</button>
<div id="create-especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Especialidad</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('especialidad.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="especialidad">Especialidad</label>
                            <input type="text" class="form-control" name="especialidad" >
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