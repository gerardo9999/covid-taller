
  @role('administrador')
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset(@avatarUsuario())}}" class="img-circle elevation-2" alt="User Image">
          </div>
          
          <div class="info">
            <a href="#" class="d-block">{{ @getUsuario(Auth::user()->id)[0]->nombre }} {{ @getUsuario(Auth::user()->id)[0]->apellidos }}</a>
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
                <a href="{{ route('paciente.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>
                    Pacientes
                  </p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                      Medicos
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    
                    <a href="{{ route('medico.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Medico</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    
                    <a href="{{ route('especialidad.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Especialidad</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    
                    <a href="{{ route('consulta.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consulta</p>
                    </a>
                  </li>
                  
                </ul>
              </li>

              <li class="nav-header">Configuracion</li>
              {{-- Hospitales --}}




              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                      Hospital
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">


                  <li class="nav-item">
                    <a href="{{ route('hospital.index') }}" class="nav-link">
                      <i class="nav-icon far fa-plus-square"></i>
                      <p>
                          Hospitales
                      </p>
                    </a>
                  </li>
                </ul>
              </li>

              {{-- <li class="nav-item has-treeview">
                
                <a href="{{ route('hospital.index') }}" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                      Hospitales
                  </p>
                </a> --}}


                
                {{-- <ul class="nav nav-treeview"> --}}

                  {{-- <li class="nav-item">
                    
                    <a href="{{ route('hospital.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Hospital</p>
                    </a>
                  </li> --}}
                  {{-- <li class="nav-item">
                    
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Plantas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultorios</p>
                    </a>
                  </li>
      
                  <li class="nav-item">
                    <a href="examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Habitaciones</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Camas</p>
                    </a>
                  </li> --}}
      
                {{-- </ul>
              </li> --}}
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
                      {{-- Administracion --}}
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Administracion
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('usuario.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('rol.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roles</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-header">Informacion</li>
            {{-- Reportes --}}
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Reportes
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte Diario</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reporte Mensual</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
  @endrole

  @role('paciente')
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
  @endrole


  @role('medico')
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(@avatarUsuario())}}" class="img-circle elevation-2" alt="User Image">
        </div>
        
        <div class="info">
          <a href="#" class="d-block">{{ @getUsuario(Auth::user()->id)[0]->nombre }} {{ @getUsuario(Auth::user()->id)[0]->apellidos }}</a>
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

            {{-- <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                <p>
                  Medicos
                </p>
              </a>
            </li> --}}


            <li class="nav-item">
              <a href="{{ route('paciente.index') }}" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                <p>
                  Pacientes
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('consulta.index') }}" class="nav-link">
                <i class="nav-icon fas fa-suitcase"></i>
                <p>
                  Consultas
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

    </div>
  @endrole
