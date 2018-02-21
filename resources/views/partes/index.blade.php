@foreach($partes as $key => $value)
  Nombre: {{ $value->nombre }} <br /><br />
  Presupuesto: {{ $value->presupuesto->nombre }} <br /><br />
  <br /><br />
@endforeach
