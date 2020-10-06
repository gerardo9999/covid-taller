<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-municipio{{ $municipio->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-municipio{{ $municipio->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Municipio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('municipio.update',['id'=>$municipio->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <input type="text" class="form-control" value="{{ $municipio->municipio }}" name="municipio" >
                </div>

                <div class="form-group">
                    <label for="provincias">Provincias</label>
                    <select class='mi-selector form-control' style="width: 100%; " name="provincias">
                        <option value="" >Provincias</option>
                        @foreach (@provincias() as $item)
                            <option class="form-control"  value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('provincias')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>