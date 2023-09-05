<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
     @yield('title')
    </title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->


    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

</head>
<body>
     @include('layouts.inc.frontnavbar')
    <div class="content">
      @yield('content')
    </div>

</div>


  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('frontend/js/custom.js') }}"></script>



     @yield('scripts')


</body>
</html>
