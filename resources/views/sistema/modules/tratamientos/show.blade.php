<a href="#" type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detalle-tratamiento{{ $tratamiento->tratamiento_id }}">
    <i class="fas fa-info"></i>
</a>
<div id="detalle-tratamiento{{ $tratamiento->tratamiento_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Tratamiento</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">

                <div class="card-body table-responsive p-0">
                    @if ($tratamientos->count())
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Medicamento</th>
                                    <th>Dosis</th>
                                    <th>Indicacion</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach (@detalleTratamiento($tratamiento->tratamiento_id) as $detalle)
                                <tr>
                                    <td>{{ $detalle->medicamento }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>{{ $detalle->indicacion }}</td>
                                </tr>                            
                            @endforeach    
                            </tbody>
                        </table>
                    @else
                        No existen datos ingresados en la tabla
                    @endif    
                    
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Cerrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>