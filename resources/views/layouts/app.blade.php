<html>
    <head>
        <title>Modifase - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
          <link rel="stylesheet" href="{{ URL::to('/') }}/css/master.css">
    </head>
    <body>

      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-4 p-5">
            <ul>
              <li><a href="/">Inicio</a></li>
              <li><a href="/materiales">Materiales</a></li>
              <li><a href="/clientes">Clientes</a></li>
              <li><a href="/presupuestos">Presupuestos</a></li>
              <li><a href="/proveedores">Proveedores</a></li>
            </ul>
          </div>
          <div class="col p-5">@yield('content')</div>
        </div>
      </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    </body>
</html>
