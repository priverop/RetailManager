@foreach($materiales as $key => $value)
  Nombre: {{ $value->nombre }} <br /><br />
  Precio: {{ $value->precio }} <br /><br />
  Proveedor: {{ $value->proveedor->nombre }} <br /><br />
  <br /><br />
@endforeach
