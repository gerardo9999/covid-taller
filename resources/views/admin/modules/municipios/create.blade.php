<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#create-municipio">Agregar Municipio</button>
<div id="create-municipio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Municipio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('municipio.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="municipio">Municipio</label>
                            <input type="text" class="form-control" name="municipio" >
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="provincias">Provincias</label>
                        <select class='mi-selector form-control' style="width: 100%; " name="provincias">
                            <option value="" >Provincias</option>
                            @foreach ($provincias as $item)
                                <option class="form-control"  value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('provincias')
                            <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                        @enderror
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