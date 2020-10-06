<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
  </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
          {{-- menu-open --}}
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Estadisticas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Medicos
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Hospitales
              </p>
            </a>
          </li>

        

          
          {{-- Departamentos --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                  Departamentos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <a href="{{ route('provincia.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provincias</p>
                </a>
              </li>
              <li class="nav-item">
                
                <a href="{{ route('municipio.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Municipios</p>
                </a>
              </li>

            </ul>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>