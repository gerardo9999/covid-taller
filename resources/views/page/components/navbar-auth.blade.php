<nav id="nav-menu-container">
                     
    <ul class="nav-menu">
        <li class="menu-active"><a href="#intro">INICIO</a></li>

        <li class="menu-has-children"><a href="">INFORMACION GENERAL</a>
            <ul>
                <li><a href="#">Dasboard</a></li>
                <li><a href="#">Covid-19</a></li>
            </ul>
        </li>
        
        <li class="menu-has-children"><a href="">PERFIL</a>
            <ul>
                <li><a href="">Perfil</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>