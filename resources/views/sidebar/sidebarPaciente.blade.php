<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset(@avatarUsuario())}}" class="img-circle elevation-2" alt="User Image">
    </div>
    
    <div class="info">
      <a href="{{ route('paciente.informe') }}" class="d-block">{{ @getUsuario(Auth::user()->id)[0]->nombre }} {{ @getUsuario(Auth::user()->id)[0]->apellidos }}</a>
    </div>
</div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
          {{-- menu-open --}}
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Estadisticas
              </p>
            </a>
          </li>

          @if (@existeConsulta(Auth::id()))
            
            <li class="nav-item">
              <a href="{{ route('paciente.medico.index') }}" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                <p>
                  Mi Medico
                </p>
              </a>
            </li>
          @endif


          <li class="nav-item">
            <a href="{{ route('paciente.consulta.index') }}" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Mis Consultas
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('paciente.prescripcion.index') }}" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Mis Prescripciones
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('paciente.examen.index') }}" class="nav-link">
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Mis Examenes
              </p>
            </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>