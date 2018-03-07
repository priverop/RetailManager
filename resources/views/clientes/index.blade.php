@extends('layouts.app')

@section('title', 'Clientes')

<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<input type="button" id ="añadir_cliente"  class="add-modal" value="Añadir Cliente" >

    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>

 <!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Direccion:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="direccion_add" cols="40" rows="5"></textarea>
                                <small>Min: 2, Max: 128, only text</small>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Provincia:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="provincia_add" cols="40" rows="5"></textarea>
                                <small>Min: 2, Max: 128, only text</small>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Telefono:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="telefono_add" cols="40" rows="5"></textarea>
                                <small>Min: 2, Max: 128, only text</small>
                                
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <form action="{{ route('clientes.create') }}" method="POST" id="addParteForm">
                        
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id=""  id="addParteButton" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        </form>
                        
    
                        
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).on('click', '.add-modal', function() {
            
            $('#addModal').modal('show');
        });
</script>


<script>
$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  

  // STORE Parte
  $('#addParteButton').click(function(event){
    event.preventDefault();

    var form_action = $("#addParteForm").attr("action");
    var concepto = $("#addParteConcepto").val();
  

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{}
    }).done(function(data){
        location.reload();
    });
  });
});
</script>


@section('content')

  @foreach($clientes as $key => $value)
    {{ $value->nombre }} <br /><br />
    {{ $value->direccion }} <br /><br />
    {{ $value->provincia }} <br /><br />
    {{ $value->telefono }} <br /><br />
    {{ $value->nif }} <br /><br />
    Obras:
    @foreach($value->obras as $keys =>$values)
      {{ $values->id }}
    @endforeach
    <br /><br />

<input type="button" value="Mostrar Cliente" onClick="window.location = 'clientes/{{ $value->id }}'"> 


    <hr />

  @endforeach


@endsection
