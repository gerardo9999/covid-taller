<a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#create-bloque{{ $hospital[0]->id }}">
    <i class="fa fa-plus-circle" aria-hidden="true"></i>
   Agregar Bloque
</a>
<div id="create-bloque{{ $hospital[0]->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Bloque {{ $hospital[0]->nombre }}</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('bloque.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="planta">Bloque</label>
                            <input type="text" class="form-control" name="bloque">
                            <input type="hidden" name="planta_id" value="{{ $hospital[0]->planta_id }}">

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