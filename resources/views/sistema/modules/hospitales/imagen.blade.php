<div class="col-lg-4 col-md-12 mb-4">
    <!--Modal: Name-->
    <div class="modal fade" id="modal1{{ $hospital->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Body-->
          <div class="modal-body mb-0 p-0">

            {{-- <div class="embed-responsive embed-responsive-16by9 z-depth-1-half"> --}}
                <img data-toggle="modal" data-target="#modal1" src="{{ asset($hospital->imagen) }}" width="100%" height="100%"  alt="Avatar">
            {{-- </div> --}}
          </div>
          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <span class="mr-4"></span>
            {{-- <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a> --}}
            <!--Twitter-->
            {{-- <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a> --}}
            <!--Google +-->
            {{-- <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a> --}}
            <!--Linkedin-->
            {{-- <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-start"></i></a> --}}

            <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Cerrar</button>

          </div>

        </div>

      </div>
    </div>
  </div>