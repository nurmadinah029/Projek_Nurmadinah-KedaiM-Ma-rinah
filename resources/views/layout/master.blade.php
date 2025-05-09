<!doctype html>
<html lang="en">
  <!--begin::Head-->
@include('layout.head')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
 @include('layout.nav')
      <!--end::Header-->
      <!--begin::Sidebar-->
@include('layout.aside')
      <!--end::Sidebar-->
      <!--begin::App Main-->
  @yield('content')
      <!--end::App Main-->
      <!--begin::Footer-->
@include('layout.footer')
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
@include('layout.script')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>