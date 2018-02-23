<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body id="page-top">
    @include('includes.header')
    @yield('content')
    @include('includes.footer')
    @include('includes.foot')
    @yield('jquery')
  </body>
</html>
