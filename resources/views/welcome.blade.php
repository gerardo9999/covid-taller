<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('web.components.head')
    <body>
        @include('web.components.header')
        <main id="main">
            @yield('contenido')
        </main>

    @include('web.components.script')
    </body>
</html>



