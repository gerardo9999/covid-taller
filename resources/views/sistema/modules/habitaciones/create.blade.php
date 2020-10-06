          <a href="#" data-toggle="modal" data-target="#habitacion-store{{ $bloque[0]->id }}-{{ $tipoHabitacion->id }}" class="small-box-footer">Mas informacion {{ $bloque[0]->id}}  <i class="fas fa-arrow-circle-right"></i></a>

          <div id="habitacion-store{{ $bloque[0]->id }}-{{ $tipoHabitacion->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header alert-default-info">
                          <h5 class="modal-title" id="my-modal-title">Guardar {{ $tipoHabitacion->nombre }} </h5>
                          <button class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form action="{{ route('habitacion.store') }}" method="post">
                          @csrf
                      <div class="modal-body">
                            <div class="row">
                              <div class="form-group col-12">
                                  <input type="text" name="habitacion" class="form-control" required placeholder="Escribe el nombre de {{ $tipoHabitacion->nombre }}">
                                  <input type="hidden" name="bloque_id" value="{{ $bloque[0]->id }}">
                                  <input type="hidden" name="tipoHabitacion_id" value="{{ $tipoHabitacion->id }}">
                              </div>
                            </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" name="guardar" value="guardar" class="btn btn-sm btn-info">Guardar</button>
                          <button type="submit" name="guardar" value="guardar_ver" class="btn btn-sm btn-success">Guardar/Ver</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>