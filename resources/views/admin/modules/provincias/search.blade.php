<form action="{{ route('provincia.index') }}" method="GET" autocomplete="off" role="search">
  <div class="input-group-prepend">
       <input  type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
       <button  class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i></button>
  </div>
</form>
