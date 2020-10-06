<!DOCTYPE html>
<html lang="en">
@include('sistema.components.head')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
@include('sistema.components.navbar')

@include('sistema.components.aside')

  <div class="content-wrapper">
    
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
@include('sistema.components.footer')
</div>
@include('sistema.components.script')
</body>
</html>
