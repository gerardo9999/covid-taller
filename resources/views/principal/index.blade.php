<!DOCTYPE html>
<html lang="en">
@include('admin.components.head')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
@include('admin.components.navbar')

@include('admin.components.aside')

  <div class="content-wrapper">
    
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
@include('admin.components.footer')
</div>
@include('admin.components.script')
</body>
</html>
