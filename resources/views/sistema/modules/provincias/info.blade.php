<a href="{{ route('provincias.confirmados.pdf', ['id'=>$provincia_id]) }}" type="button" class="btn btn-sm btn-danger">
    <i class="fas fa-file-pdf"></i>&nbsp; Confirmados
</a> 
<a href="{{ route('provincias.recuperados.pdf', ['id'=>$provincia_id]) }}" type="button" class="btn btn-sm btn-info">
    <i class="fas fa-file-pdf"></i>&nbsp; Recuperados
</a>    
<a href="{{ route('provincias.desesos.pdf', ['id'=>$provincia_id]) }}" type="button" class="btn btn-sm btn-secondary">
    <i class="fas fa-file-pdf"></i>&nbsp; Desesos
</a>    
<a href="{{ route('provincias.sospechosos.pdf', ['id'=>$provincia_id]) }}" type="button" class="btn btn-sm btn-warning">
    <i class="fas fa-file-pdf"></i>&nbsp; Sospechosos
</a>    
<a href="{{ route('provincias.descartados.pdf', ['id'=>$provincia_id]) }}" type="button" class="btn btn-sm btn-success">
    <i class="fas fa-file-pdf"></i>&nbsp; Descartados
</a>     