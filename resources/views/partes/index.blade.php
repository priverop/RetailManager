@foreach($partes as $key => $value)
  Nombre: {{ $value->nombre }} <br /><br />
  Presupuesto: {{ $value->presupuesto->nombre }} ({{$value->presupuesto->id}}) <br /><br />
  <br /><br />
@endforeach
