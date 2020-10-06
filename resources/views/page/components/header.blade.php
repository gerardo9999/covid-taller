<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto">BOLIVIA</a></h1>
        </div>
        @auth
            @include('page.components.navbar-auth')
        @endauth
        @guest
            @include('page.components.navbar-guest')
        @endguest
    
    </div>
</header>