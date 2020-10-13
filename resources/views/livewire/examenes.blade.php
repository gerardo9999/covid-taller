<div>
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Examenes</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Examen</li>
        </ol>
        </div>
    </div>
    </div>
</div>
@include('sistema.components.flash')
<div class="row">
    <div class="col-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"></h3>
    
            <div class="card-tools">
                <form>
                    <div class="input-group-prepend">
                         <input  type="text" class="form-control" wire:model='searchText' placeholder="Buscar..." >
                         <button  disabled class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th >Fecha Realizado</th>
                        <th >Estado</th>
                        <th >Descripcion</th>
                        <th style="width:10%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($examenes as $examen)
                        <tr>

                            <td>{{ $examen->fecha_realizado }} </td>
                            <td>{{ $examen->descripcion_examen }} </td>
                            @if ($examen->estado)
                                <td> <span class="badge badge-danger">Entregado</span></td>
                                <td> <a href="{{ route('resultado.pdf', ['id'=>$examen->examen_id]) }}" class="btn btn-info btn-sm"><i class="fa fa-file-pdf"></i></a></td>

                            @else    
                                <td> <span class="badge badge-success">No Entregado</span></td>
                                @if ($examen->tipo_id==1)
                                <td>
                                    @include('sistema.modules.examenes.resultado')
                                </td>
                                @else
                                <td>
                                    @include('sistema.modules.examenes.resultado')
                                </td>
                                @endif
                            @endif
                            
                        </tr>  
                @endforeach    
                </tbody>
            </table>
        </div>
    <div class="card-footer">
        {{ $examenes->render() }}
    </div>
    </div>
    </div>
    
</div>
</div>
