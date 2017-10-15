<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

  @include('inc.head')

  <body>
    <div id="app">
      
      @include('inc.nav')

      @yield('content')

    </div>

    <script src="{{asset('js/manifest.js')}}"></script>
    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>

  </body>
</html>
