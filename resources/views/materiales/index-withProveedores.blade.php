<table id="selectMaterial" class="display" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Material</th>
      <th>Proveedor</th>
      <th>Precio</th>
      <th>Material ID</th>
      <th>Proveedor ID</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pivotTable as $key => $value)
    <tr>
      <td>{{ $key }}</td>
      <td>{{ $value->m_nombre }}</td>
      <td>{{ $value->p_nombre }}</td>
      <td>{{ $value->precio }}</td>
      <td>{{ $value->material_id }}</td>
      <td>{{ $value->proveedor_id }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
