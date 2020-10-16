<div>  
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-header border-0">
                <button wire:click='' class="btn btn-info btn-sm">Provincia</button>
                <button wire:click='' class="btn btn-info btn-sm">Municipio</button>
                {{-- <div class="d-flex justify-content-between"> 

                    @role('administrador')
                        <a href="javascript:void(0);">Ver Reporte</a>
                    @endrole
                </div> --}}
            </div>
            <div class="card-body">
                
                <div class="d-flex">
                    <p class="d-flex flex-column">
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                    </p>
                </div>

             
                <div class="position-relative mb-4">
                    <canvas id="chart"  height="100"></canvas>
                </div>

                <div class="position-relative mb-4">
                    <canvas id="chartMunicipio"  height="100"></canvas>
                </div>

                <div class="position-relative mb-4">
                    <canvas id="chartProvincia"  height="100"></canvas>
                </div>



            <div class="d-flex flex-row justify-content-end">               
            </div>
            </div>
        </div>
    </div>
</div>
