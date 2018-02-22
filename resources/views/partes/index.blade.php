@foreach($partes as $key => $value)
  Nombre: {{ $value->nombre }} <br /><br />
  Presupuesto: {{ $value->presupuesto->nombre }} ({{$value->presupuesto->id}}) <br /><br />
  Materiales:
  @foreach($value->materiales as $keys =>$values)
    {{ $values->nombre }} -
  @endforeach
  <br /><br /><br /><br />
@endforeach
