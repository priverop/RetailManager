@foreach($materiales as $key => $value)
  {{ $value->nombre }} <br /><br />
  {{ $value->precio }} <br /><br />
  {{ $value->proveedor->nombre }} <br /><br />
  <br /><br />
@endforeach
