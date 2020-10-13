<button wire:click='resetear()' class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#examen{{ $examen->examen_id }}">
    <i class="fa fa-apper"></i>
</button>
<div wire:ignore.self id="examen{{ $examen->examen_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Enviar resultados</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Resultados  : {{ $resultado }}</label>
                            <select id="" class="form-control" wire:model='resultado'>
                                <option>Positivo</option>
                                <option>Negativo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" wire:model='descripcion' id="" cols="30" rows="10"></textarea> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent='enviar_resultados({{ $examen->examen_id }})' data-dismiss="modal" aria-label="Close" type="submit" class="btn btn-danger">SI</button>
            </div>
        </div>
    </div>
</div>