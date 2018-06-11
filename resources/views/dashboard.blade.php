@extends('layouts.app')

@section('title', 'Modifase - Panel Principal')

@section('content')
  <h1>Panel Principal</h1>

<div class="row mt-5">
  <div class="col border p-3">
    <h4>Clientes</h4>
    <p>{{count($clientes)}} clientes en cartera.</p>
    <a href="{{ route('clientes.index') }}"><button class="btn btn-primary">VER LISTA</button></a>
  </div>
  <div class="col border p-3">
    <h4>Proveedores</h4>
    <p>{{count($proveedores)}} proveedores añadidos.</p>
    <a href="{{ route('proveedores.index') }}"><button class="btn btn-primary">VER LISTA</button></a>
  </div>
  <div class="col border p-3">
    <h4>Obras</h4>
    <p>{{count($obras)}} obras presupuestadas.</p>
    <a href="{{ route('obras.index') }}"><button class="btn btn-primary">VER LISTA</button></a>
  </div>
</div>

<div class="row mt-5">
  <div class="col border p-3">
    <h4>Informe Total Presupuestado</h4>
    <p>Puede modificar las fechas y pulse en actualizar.</p>
    <div class="mt-5">
      <form>
        <div class="form-row">
          <div class="form-group">
            <label class="control-label col-sm-6" for="desde"><b>DESDE:</b></label>
            <div class="col-sm-10"><input type="date" name="desde" value="2018-01-01"></div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-6" for="hasta"><b>HASTA:</b></label>
            <div class="col-sm-10"><input type="date" name="hasta" value="2019-01-01"></div>
          </div>
          <button class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
    <table id="indexObra">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Precio Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($obras as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->fecha }}</td>
            <td>{{ $value->cliente->nombre }}</td>
            <td>{{ $value->precio_total_beneficio}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

<script>
$(function(){
  $('#indexObra').DataTable({
    
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });
});
</script>

@endsection
