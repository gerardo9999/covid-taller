{{-- Muestra las notificaciones de las acciones create, update ,delete --}}
@if(session()->has('create'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="row">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong></strong> {{ session('create') }}
        </div>
    </div>
</div>
@endif
@if(session()->has('update'))
        
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="row">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong></strong> {{ session('update') }}
        </div>
    </div>
</div>
@endif





@if(session()->has('delete'))                
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="row">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong></strong> {{ session('delete') }}
        </div>
    </div>
</div>
@endif

@if(session()->has('info'))                
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
        <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
        <strong></strong> {{ session('info') }}
    </div>
</div>
@endif




@if(session()->has('warning'))                
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="row">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong></strong> {{ session('warning') }}
        </div>
    </div>
</div>
@endif