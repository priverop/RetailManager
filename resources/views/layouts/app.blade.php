<html>
<head>
  <title>Modifase - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css" rel="stylesheet">

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>
  <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/master.css') }}">

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ URL::to('/') }}" id="logo"><img src="{{asset('images/logo_grande.png')}}" alt="Logo Modifase" /></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if($location == 'home') active @endif"><a class="nav-link" href="{{ URL::to('/') }}">Inicio</a></li>
      <li class="nav-item @if($location == 'materiales') active @endif"><a class="nav-link" href="{{ route('materiales.index') }}">Materiales</a></li>
      <li class="nav-item @if($location == 'clientes') active @endif"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
      <li class="nav-item @if($location == 'obras') active @endif"><a class="nav-link" href="{{ route('obras.index') }}">Obras</a></li>
      <li class="nav-item @if($location == 'presupuestos') active @endif"><a class="nav-link" href="{{ route('presupuestos.index') }}">Muebles</a></li>
      <li class="nav-item @if($location == 'proveedores') active @endif"><a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a></li>
    </ul>
    <a href="mailto:admin@thecloud.group" class="float-right">Ayuda</a>
  </nav>

  <div class="container-fluid">
    <div class="row mini-jumbo">
      <div class="col"><h2 class="cabecera">@yield('title')</h2></div>

    </div>
  </div>


  <div class="container main-content">
    @yield('content')
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{asset('js/datepicker-es.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.10.18/sorting/datetime-moment.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
</body>
</html>
