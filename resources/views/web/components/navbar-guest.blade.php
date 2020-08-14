<nav id="nav-menu-container">
    <ul class="nav-menu">
       <li class="menu-active"><a href="#intro">INICIO</a></li>

       <li class="menu-has-children"><a href="">INFORMACION GENERAL</a>
           <ul>
           <li><a href="#">Dasboard</a></li>
           <li><a href="#">Covid-19</a></li>
           </ul>
       </li>
           <li class="menu-has-children"><a href="#">LOGIN</a>
               <ul>
               <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
               <li><a href="{{ route('register') }}">Registrarse</a></li>
               </ul>
           </li>
       </ul>
   </nav>