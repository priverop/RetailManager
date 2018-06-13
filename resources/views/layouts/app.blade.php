<html>
    <head>
        <title>Modifase - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">

        <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">

    </head>
    <body>

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-1 border p-5">
            <div id="logo">
              <img src="{{asset('images/logo_grande.png')}}" alt="Logo Modifase" />
            </div>
            <ul>
              <li><a href="{{ URL::to('/') }}">Inicio</a></li>
              <li><a href="{{ route('materiales.index') }}">Materiales</a></li>
              <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
              <li><a href="{{ route('obras.index') }}">Obras</a></li>
              <li><a href="{{ route('presupuestos.index') }}">Muebles</a></li>
              <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
            </ul>
          </div>
          <div class="col p-5">@yield('content')</div>
        </div>
      </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    </body>
</html>
