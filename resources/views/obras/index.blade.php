@extends('layouts.app')

@section('title', 'Obras')

@section('content')

<h1>Lista de Obras</h1>

<button class="btn btn-primary">Obra Nueva</button>

<div class="row">
  <table id="index">
    <thead>
      <tr>
        <th>#</th>
        <th>Fecha</th>
        <th>Cliente</th>
      </tr>
    </thead>
    @foreach($obras as $key => $value)
      <tr>
        <td>{{ $key }}</td>
        <td>{{ $value->fecha }}</td>
        <td>{{ $value->cliente->nombre }}</td>
      </tr>
    @endforeach
  </table>
</div>

<script>
$(function(){
  $('#index').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });
});

</script>

@endsection
