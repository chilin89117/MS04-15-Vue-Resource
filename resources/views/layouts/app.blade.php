<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

  @include('inc.head')

  <body>

    @include('inc.nav')

    <div id="app">

      @yield('content')

    </div>

    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
