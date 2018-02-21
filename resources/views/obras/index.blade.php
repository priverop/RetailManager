@foreach($obras as $key => $value)
  Obra del cliente: {{ $value->cliente->nombre }} <br /><br />
  <br /><br />
@endforeach
