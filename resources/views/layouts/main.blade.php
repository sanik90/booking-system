<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body id="page-top">
    @if (Auth::check())
        @include('includes.auth-header')
    @else
        @include('includes.header')
    @endif
    @yield('content')
    @include('includes.footer')
    @include('includes.foot')
    @yield('jquery')
  </body>
</html>
