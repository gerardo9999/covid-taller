<div>
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tratamientos</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Tratamientos</li>
            </ol>
            </div>
        </div>
    </div>

    @if ($lista)
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <button wire:click='mostrarFormulario()' class="btn btn-sm btn-info">Agregar Tratamiento</button>
                        {{-- @include('sistema.modules.tratamientos.create') --}}
                        <h3 class="card-title"></h3>
            
                        <div class="card-tools">

                            {{-- @include('sistema.modules.especialidades.search') --}}
                        </div>
                    </div>
                            <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        @if ($tratamientos->count())
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tratamiento</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tratamientos as $tratamiento)
                                    <tr>
                                        <td>{{ $tratamiento->tratamiento_id }}</td>
                                        <td>{{ $tratamiento->tratamiento }}</td>
                                        <td>
                                            @include('sistema.modules.tratamientos.destroy')
                                            @include('sistema.modules.tratamientos.show')
                                        </td>
                                    </tr>                            
                                @endforeach    
                                </tbody>
                            </table>
                        @else
                            <div class="text-center" style="color : #0cc2000;">
                                No existen datos ingresados en la tabla
                            </div>
                        @endif    
                        
                    </div>
                    <div class="card-footer">
                        {{ $tratamientos->render() }}
                    </div>
                </div>
            </div>
        </div>        
    @endif
    
    @if ($create)
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Realizar un tratamiento</h3>
        </div>
        <div class="card-body">
            <div class="row p-2">
    
                <div class="col-6">
                    <label for="name">Nombre Tratamiento </label> 
                    <input type="text"  wire:model='nombreTratamiento' id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Escriba el nombre del tratamiento">
                    @error('nombreTratamiento')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>
    
                <div class="col-6">
                    <label for="">Seleccione un Medicamento</label><br> 

                    {{-- Modal para agregar medicamentos --}}
                    <button wire:click='accionCrear()' data-toggle="modal" data-target="#medicamentos" class="btn btn-sm btn-info btn-block">Medicamentos</button>
                    
                    <div wire:ignore.self class="modal fade" id="medicamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                                <div class="modal-header alert-default-info">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $modalTitle }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    @if ($listaMedicamento)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-secondary">
                                                    <div class="card-header">
                                                        {{-- <button wire:click='mostrarFormulario()' class="btn btn-sm btn-info">Agregar Tratamiento</button> --}}
                                                        {{-- @include('sistema.modules.tratamientos.create') --}}
                                                        <h3 class="card-title"></h3>
                                            
                                                        <div class="card-tools">
                                                            @if ($medicamentos->count())
                                                                <form>
                                                                    <div class="input-group-prepend">
                                                                        <input  type="text" class="form-control" name="searchText" placeholder="Buscar..." wire:model="searchTextMedicamento">
                                                                        <button disabled class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i></button>
                                                                
                                                                    
                                                                    </div>
                                                                </form>
                                                            @else
                                                                <button class="btn btn-m btn-info">Agregar Medicamento</button>

                                                            @endif 
                                                            
                                                            {{-- @include('sistema.modules.especialidades.search') --}}
                                                        </div>
                                                    </div>
                                                            <!-- /.card-header -->
                                                    <div class="card-body table-responsive p-0">
                                                            @if ($medicamentos->count())
                                                                <table class="table table-hover text-nowrap">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Medicamento</th>
                                                                            <th>Accion</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach ($medicamentos as $medicamento)
                                                                        <tr>
                                                                            <td>{{ $medicamento->id }}</td>
                                                                            <td>{{ $medicamento->nombre }}</td>
                                                                            <td>
                                                                                {{-- @include('sistema.modules.tratamientos.destroy') --}}
                                                                                <button wire:click='formularioIndicaciones({{ $medicamento->id }})' class="btn btn-sm btn-success"><i class="fa fa-check"></i>&nbsp; Agregar</button>
                                                                            </td>
                                                                        </tr>                            
                                                                    @endforeach    
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="text-center">
                                                                    No sexiste ningun medicamento agregado
                                                                </div>
                                                            @endif

                                                    </div>
                                                    <div class="card-footer">
                                                        {{-- {{ $especialidades->render() }} --}}
                                                    </div>
                                                            <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>                                         
                                    @endif
                                    @if ($createIndicacion)
                                       <div class="center border p-4">
                                         Medicamento : {{ $nombreMedicamento }} 
                                       </div>

                                       <div class="border p-4">
                                            <label for="name">Dosis : {{ $cantidad }}</label> 
                                            <input type="number"  wire:model="cantidad" id="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Escriba el name del paciente">
                                            @error('cantidad')
                                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                            @enderror
                                            <label for="">Indicacion medica</label>
                                            <textarea wire:model='indicacion' class="form-control form-control-sm"  cols="30" rows="10">

                                            </textarea>
                                            @error('indicacion')
                                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                            @enderror
                                       </div>
                                       <div class="center border p-2">
                                            <button wire:click='agregarDetalle()' class="btn btn-sm btn-success">Agregar</button>
                                      </div>
                                    @endif

                                    













                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                           </div>
                        </div>
                    </div>
                    {{-- fin del modal medicamentos --}}
                    
                </div>
            </div>
        
        </div>
        {{-- Tabla del detalle --}}
        <div class="card card-info">
            @if ($arrayMedicamento)
                <div class="card-header">
                
                    {{-- <button wire:click='mostrarFormulario()' class="btn btn-sm btn-info">Agregar Tratamiento</button> --}}
                    {{-- @include('sistema.modules.tratamientos.create') --}}
                    <h3 class="card-title"></h3>
        
                    <div class="card-tools">
                        {{-- @include('sistema.modules.especialidades.search') --}}
                    </div>
                </div>
                        <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Medicamento</th>
                                    <th>Dosis</th>
                                    <th>Indicacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php
                                    $length = count($arrayMedicamento);
                                @endphp
                                @for ($i = 0; $i  < $length; $i++)
                                        <tr class="text-center">
                                            <td>{{ $arrayMedicamento[$i]["medicamento_id"] }}</td>
                                            <td>{{ $arrayMedicamento[$i]["medicamento"] }}</td>
                                            <td>{{ $arrayMedicamento[$i]["cantidad"] }}</td>
                                            <td>{{ $arrayMedicamento[$i]["indicacion"] }}</td>
                                            <td>
                                                <button wire:click='eliminarMedicamentoDetalle({{ $i }})' class="btn btn-sm btn-success"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                @endfor    
                            </tbody>
                        </table>
                </div>

                <div class="card-footer">
                    {{-- {{ $especialidades->render() }} --}}
                </div>
            @else
                <div class="card-header">
                    <h5>No se ha seleccionado ningun medicamento</h5>

                </div>
                <div class="text-center">
                    @error('arrayMedicamento')
                        <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                    @enderror
                </div>

            @endif

        </div>
    </div>  
    
    <button wire:click='ocultarFormulario()' class="btn btn-sm btn-success">Volver a la lista</button>
    <button wire:click='guardarTratamiento()' class="btn btn-sm btn-success">Guardar Tratamiento</button>
    @endif

</div>
